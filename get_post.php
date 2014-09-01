<?php
require_once("loginform/secure/logindb.php");
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

mysql_select_db($db_database,$db_server)
 or die("database error");

function get_post($var)
{
	return mysql_real_escape_string($_POST[$var]);
}

function test_email($email)
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				my_die("invalid email address");
			}
			else
			{
				$email = $_POST['email'];
				return $email;
			}
		}

function my_die($error)
{
	include'header.php';
	echo"<center><h1>" . $error . "</h1></center>";
	include'footer.php';
	die();
}		
?>