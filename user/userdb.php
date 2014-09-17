<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/loginform/secure/logindb.php");
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
		public $row = mysql_fetch_row($result); //user data is assigned as array to $row
		
		/***Assign user data from database to variables to use. ***/
		/*$userid = $row[0];
		$username = $row[1];
		//pw is on row 2 so don't put it into variable.
		$useremail = $row[3];
		$datejoined = $row[4];
		$realname = $row[6];
		$usercity = $row[7];
		$userstate = $row[8];
		$usercountry = $row[9];
		$userwebsite = $row[10];
		$dateofbirth = $row[11];
		$userabout = $row[12]; */
	}
?>