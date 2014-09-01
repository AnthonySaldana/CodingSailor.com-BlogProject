<?php
require_once('../get_post.php');
require_once('../loginform/secure/logindb.php');

//check if all fields are filled in, if not then send em' packing.
if(isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd']))
{
	//connect to db
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!db_server) 
	{
	$msg = "could not connect to database. login failed";
	die(mysql_fatal_error($msg));
	}
	mysql_select_db($db_database, $db_server)
	or die("database error");

	//Sanitize the input
	//hash and salt the passwords
	$user = get_post('username');
	$presalt = "%^&PenBand3721";
	$postsalt = "*3721%Arbie^7494";
	$pw = $presalt . get_post('pwd') . $postsalt ;
	$token = sha1($pw); // <-- hashed and salted. password 2.0!
	
	//run this if the the signup button was clicked. If sign in was clicked, skip it.
	if(isset($_POST['signup']))
	{
		$email = test_email($_POST['email']);
		$duplicatequery = mysql_query("SELECT 1 FROM user where email = '$email'");
		if (mysql_num_rows($duplicatequery) == 0 )
		{
			$datejoined = date('y/m/d');
			$signupquery = "INSERT INTO user(username, password, email, datejoined) 
			VALUES('$user', '$token', '$email' , '$datejoined')";
			$result = mysql_query($signupquery);
			if(!result) die("error signing up");
			//echo "signed up";
		}
		else my_die ("duplicate email");
	}
	
	//Here we check if the username/password combo exists and if not, send em packing!
	//If it does, well login.
		$loginquery = "SELECT * FROM user WHERE username = '$user'";
		$result = mysql_query($loginquery);
		if(!$result) die("error");
		
		elseif (mysql_num_rows($result))
		{
			$row = mysql_fetch_row($result);
			if($token == $row[2])
				{
					session_start();
					$_SESSION['username'] = $user;
					$_SESSION['password'] = $token;
					$_SESSION['email'] = $email;
					//echo"login successful";
					header("Location: http://codingsailor.com");
				}
			else die("invalid username/ password combination");
		}
		
		else die("invalid username/ password combination");
	
	//setcookie('userid', $token, time() + 60 * 60 * 24 * 7, '/' );
	
	
	//$loginquery = "SELECT "
	
	
}
else echo "Please go back and fill in all fields.";
?>