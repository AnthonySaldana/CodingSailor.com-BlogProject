<?php
session_start();
if(isset($_SESSION['username']))
	{
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$email = $_SESSION['email'];
				echo "<p> Hello $username.</p>";
				echo "<a href='../loginform/logout.php'>Logout</a>";
require_once("../get_post.php");
$id = get_post('id');
$content = get_post('content');
echo<<<_htmleditsql
<form action="editpostprocess.php" method = "POST">
<textarea name="editcontent"cols="75" rows="10"> $content </textarea>
<input type="hidden" name="id" value="$id"/>
<input type="submit" name="submitedit" value="Submit Edit"/>
</form>
_htmleditsql;
}

else die("only admin allowed");
?>