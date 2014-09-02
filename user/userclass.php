<?php
$root = $_SERVER['DOCUMENT_ROOT'];
/*$config = parse_ini_file($root .  '/../config.ini', true);

$db_hostname = $config['database']['host'];
$db_username = $config['database']['username'];
$db_password = $config['database']['password'];
$db_database = $config['database']['databasename'];*/

//
class user 
{
		//include_once($root . "/loginform/secure/logindb.php");
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
				$this->realname = $row[6];
				$this->usercity = $row[7];
				$this->userstate = $row[8];
				$this->usercountry = $row[9];
				$this->userwebsite = $row[10];
				$this->dateofbirth = $row[11];
				$this->userabout = $row[12];
			}
	}
		
}
?>