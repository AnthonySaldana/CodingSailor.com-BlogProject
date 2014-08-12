<?php
echo"Coding Sailor is currently under construction.";
//HTML code for the login form
$htmllogin = <<<_codinghtml

<html>
	<head><link rel="stylesheet" type="text/css" href="../styles/login.css"> 
</head>
<body>
	<form name="login" action="loginform/processlogin.php" method="POST" id="login">
		Username: <input type="text" name="username">
		</br>
		Password: <input type="password" name="pwd">
		</br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
_codinghtml;

echo $htmllogin; //displays the login form
?>