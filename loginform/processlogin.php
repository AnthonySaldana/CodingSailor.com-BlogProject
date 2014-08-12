<?php
require_once('../get_post.php');
require_once('../loginform/secure/logindb.php');

$db_serveer = mysql_connect($db_hosname, $db_username, $db_password);

if(!db_server) 
{
$msg = "could not connect to database. login failed";
die(mysql_fatal_error($msg));
}

mysql_select_db($db_database, $db_server)
or die("database error");

if(isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd']))
{
	$user = get_post('username');
	$pw = get_post('pwd');
	
	
}
else echo "Please go back and fill in all fields.";
?>