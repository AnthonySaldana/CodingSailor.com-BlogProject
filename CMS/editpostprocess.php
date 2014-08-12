<?php
require_once("../get_post.php");
require_once("../loginform/secure/logindb.php");
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("couldnt connect to server");

mysql_select_db($db_database, $db_server) or die("couldnt connect to database");

$id = get_post('id');
$content = get_post('editcontent');
$query = "UPDATE blogpost set content = '$content' WHERE id='$id'";
if(!mysql_query($query)) die("problem processing query");
else header("Location: http://codingsailor.com/CMS/cmsform.php");
?>