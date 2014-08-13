<?php

//HTML code for the login form
session_start();
//start session
if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$email = $_SESSION['email'];
		echo "<p> Hello $username.</p>";
		echo "<a href='../loginform/logout.php'>Logout</a>";
	}
else {
$htmllogin = <<<_codinghtml
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../loginform/styles/login.css"> 
	<script type="text/javascript" src="../loginform/js/registerscript.js"></script>
</head>
<body onload="hidethese()">
	<button onclick="loadform()" id="loadbutton" type=button >login/signup</br></button>
	
	<form  id="login" name="login" action="loginform/processlogin.php" method="POST" />
		<a href="#" onclick="hidethese()">X</a></br>
		Username: <input type="text" name="username"/>
		Password: <input type="password" name="pwd"/>
		<label for="email" id="emaillabel">Email:</label>
		<input type="text" name="email" id="emailsec"/>
		<input type="submit" name="signin" value="Sign In" id="signinbutton"/>
		<input type="submit" name="signup" value="register" id="signupbutton"/>
		<button onclick="register()" id="registerbutton" type=button >Sign Up</button>
	</form>
	
	</br>
</body>
</html>
_codinghtml;

echo $htmllogin; //displays the login form
}

echo"Coding Sailor is currently under construction.";
?>