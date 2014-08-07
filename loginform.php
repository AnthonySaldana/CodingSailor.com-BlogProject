<?php
require_once'secure/logindb.php';
include_once("secure/mysqlfatalerror.php"); 
// function inside here incase of error. Creates a client friendly error message
$db_server = mysql_connect($db_hostname, $db_username, $db_password); //connect to database

if(!$db_server) //if connection is unsuccessful this will display a client friendly error message. 
	{
		$errormsg="Database failed to connect"; 
		die(mysql_fatal_error($errormsg));
	}
	
echo"Coding Sailor is currently under construction.";
$htmllogin = <<<_codinghtml //HTML code for the login form

<html>
	<head><link rel="stylesheet" type="text/css" href="../styles/login.css"> 
</head>
<body>
	<form name="login" action="processlogin.php" method="POST" id="login">
		Username: <input type="text" name="pwd">
		</br>
		Password: <input type="password" name="user">
		</br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
_codinghtml;

echo $htmllogin; //displays the login form
?>
