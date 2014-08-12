<?php
require_once('../get_post.php');
require_once('../loginform/secure/logindb.php');


if(isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd']))
{
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!db_server) 
	{
	$msg = "could not connect to database. login failed";
	die(mysql_fatal_error($msg));
	}
	mysql_select_db($db_database, $db_server)
	or die("database error");

	$user = get_post('username');
	$presalt = "%^&PenBand3721";
	$postsalt = "*3721%Arbie^7494";
	$pw = $presalt . get_post('pwd') . $postsalt ;
	$token = sha1($pw);
	
	if(isset($_POST['signup']))
	{
		$email = get_post('email');
		$signupquery = "INSERT INTO user(username, password, email) 
		VALUES('$user', '$token', '$email')";
		$result = mysql_query($signupquery);
		if(!result) die("error signing up");
		echo "signed up";
	}
	
	
	
	//setcookie('userid', $token, time() + 60 * 60 * 24 * 7, '/' );
	
	
	//$loginquery = "SELECT "
	
	
}
else echo "Please go back and fill in all fields.";
?>