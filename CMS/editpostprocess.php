<?php
session_start();
if(isset($_SESSION['username']))
	{
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$email = $_SESSION['email'];
require_once("../get_post.php");
require_once("../loginform/secure/logindb.php");
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("couldnt connect to server");

mysql_select_db($db_database, $db_server) or die("couldnt connect to database");

$id = get_post('id');
$content = get_post('editcontent');
$title = get_post('title');
$query = "UPDATE blogpost set content = '$content' WHERE id='$id'";
if(!mysql_query($query)) die("problem processing content");
else
	$query = "UPDATE blogpost set title = '$title' WHERE id='$id'";
	if(!mysql_query($query)) die("problem processing title");
		else header("Location: http://codingsailor.com/CMS/cmsform.php");
}

else die("only admin allowed");
?>