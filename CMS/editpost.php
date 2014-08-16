<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/header.php");
session_start();
if(isset($_SESSION['username']))
	{
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$email = $_SESSION['email'];
				echo "<p> Hello $username.</p>";
				echo "<a href='../loginform/logout.php'>Logout</a>";
require_once("../get_post.php");
$id = $_POST['id'];
$content = $_POST['content'];
$title = $_POST['title'];
echo<<<_htmleditsql
			<div class='containter'>
			<div class='row'>
			<div class='col-md-6'>
			<div class='list-group'>
			
			<a href='#' class='list-group-item'>
			<h2 Class='list-group-item-heading'>Edit $title</h2>
			<form action="editpostprocess.php" method = "POST">
			Title:
			<textarea name="title" cols="18" rows="1">$title</textarea></br>
			<textarea name="editcontent"cols="75" rows="10"> $content </textarea></br>
			<input type="hidden" name="id" value="$id"/>
			<input type="submit" name="submitedit" value="Submit Edit"/>
			</form>
			</a>
			
			</div>
			</div>
			</div>
			</div>
_htmleditsql;
}

else die("only admin allowed");
?>