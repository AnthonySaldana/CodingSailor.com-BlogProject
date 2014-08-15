<?php
	//database login information
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$email = $_SESSION['email'];
		echo "<p> Hello $username.</p>";
	}
?>