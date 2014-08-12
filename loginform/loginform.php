<?php

//HTML code for the login form
session_start();

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
<DOCTYPE html5>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/login.css"> 
	<script type="text/javascript" src="../loginform/js/registerscript.js"></script>
</head>
<body onload="hidethese()">
	
	<form name="login" action="loginform/processlogin.php" method="POST" id="login"/>
		Username: <input type="text" name="username"/>
		</br>
		Password: <input type="password" name="pwd"/>
		</br>
		<label for="email" id="emaillabel">Email:</label>
		<input type="text" name="email" id="emailsec"/>
		<input type="submit" name="signin" value="Sign In" id="signinbutton"/>
		<input type="submit" name="signup" value="register" id="signupbutton"/>
		<button onclick="register()" id="registerbutton" type=button >Sign Up</button>
	</form>
	
	
	
</body>
</html>
_codinghtml;

echo $htmllogin; //displays the login form
}

//echo"Coding Sailor is currently under construction.";
?>