<?php
$root = $_SERVER['DOCUMENT_ROOT'];

class user 
{
public $userid;
public $username;
public $password;
public $useremail;
public $datejoined;
public $realname;
public $usercity;
public $userstate;
public $usercountry;
public $userwebsite;
public $dateofbirth;
public $userabout;
public $userimg;

function __construct()
{		
	$root = $_SERVER['DOCUMENT_ROOT'];
	$config = parse_ini_file($root .  '/../config.ini', true);
	
	$db_hostname = $config['database']['host'];
	$db_username = $config['database']['username'];
	$db_password = $config['database']['password'];
	$db_database = $config['database']['databasename'];
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!db_server) 
	{
	$msg = "could not connect to database. login failed";
	die(mysql_fatal_error($msg));
	}
	mysql_select_db($db_database, $db_server)
	or die("database error");
	
	session_start();
	if(isset($_SESSION['username']))
	{
	/** Connect to the database. Query to get the profile info of logged in user.**/
	$username = $_SESSION['username'];
	$userid = $_SESSION['id'];
	$profilequery = "SELECT user.*, userinfo.* FROM user 
	INNER JOIN userinfo ON user.id = userinfo.id WHERE user.id = '$userid'";
	$result = mysql_query($profilequery);
	if(!$result) die("error<br/>" . mysql_error());
	$row = mysql_fetch_row($result); //user data is assigned as array to $row
	
	/***Assign user data from database to variables to use. ***/
	$this->userid = $row[0];
	$this->username = $row[1];
	$this->password = $row[2];
	$this->useremail = $row[3];
	$this->datejoined = $row[4];
	$this->userimg = $row[5];
	//row 6 is equal to the userid. Used to link tables.
	$this->realname = $row[7];
	$this->usercity = $row[8];
	$this->userstate = $row[9];
	$this->usercountry = $row[10];
	$this->userwebsite = $row[11];
	$this->dateofbirth = $row[12];
	$this->userabout = $row[13];
	}
}

function editprofile()
{	
	$query = "UPDATE user, userinfo
	 SET user.username = '$this->username', 
	 user.email = '$this->useremail',
	 userinfo.name = '$this->realname',
	 userinfo.city = '$this->usercity',
	 userinfo.state = '$this->userstate',
	 userinfo.country = '$this->usercountry',
	 userinfo.website = '$this->userwebsite', 
	 userinfo.birthdate = '$this->dateofbirth',
	 userinfo.aboutme = '$this->userabout'
	 WHERE user.id = userinfo.id
	 AND user.id = '$this->userid'";
	if(!mysql_query($query)) die("Error updating profile." . mysql_error());
	}
}
?>
