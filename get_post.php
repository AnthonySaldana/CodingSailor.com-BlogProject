<?php
require_once("loginform/secure/logindb.php");
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

mysql_select_db($db_database,$db_server)
 or die("database error");

function get_post($var)
{
	return mysql_real_escape_string($_POST[$var]);
}
?>