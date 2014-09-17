<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/comments/commentclass.php';
include_once $root . '/comments/commentform.php';
if( isset($_POST['sendcomment']))
{
	include_once $root . '/comments/sendcomment.php';
}
?>