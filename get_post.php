<?php
require_once'loginform/secure/logindb.php';

function get_post($var)
{
	return mysql_real_escape_string($_POST[$var]);
}
?>