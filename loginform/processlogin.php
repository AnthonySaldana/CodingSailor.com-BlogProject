<?php
require_once('../get_post.php');
require_once('../db/loginclass.php');
require_once('loginregclass.php');
//check if all fields are filled in, if not then send em' packing.
if(isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd']))
{
    $login = new logindb();//connect to db
    $user = get_post('username');
    $pass = get_post('pwd');
	$userlogin = new userloginreg($user,$pass);
    
	//run this if the the signup button was clicked. If sign in was clicked, skip it.
	if(isset($_POST['signup']))
	{
		$email = test_email($_POST['email']);
		if (!$userlogin->dupemail($email)) //class function checks for duplicate email
		{
			if(!$userlogin->dupuser()) //class function checks for duplicate username
			{
                $userlogin->newuserquery();
			}
			else my_die ("duplicate username");
		}
		else my_die ("duplicate email");	
	}
	
	//Here we check if the username/password combo exists and if not, send em packing!
	//If it does, well login.
		$loginquery = "SELECT * FROM user WHERE username = '$userlogin->user'";
		$result = mysql_query($loginquery);
		if(!$result) die("error");
		
		elseif (mysql_num_rows($result))
		{
			$row = mysql_fetch_row($result);
			if($userlogin->token == $row[2])
				{
					session_start();
					$id = $row[0];
					$_SESSION['username'] = $userlogin->user;
					$_SESSION['password'] = $userlogin->token;
					$_SESSION['id'] = $id;
					//echo"login successful";
					header("Location: http://codingsailor.com");
				}
			else die("invalid username/ password combination token");
		}
		
		else die("invalid username/ password combination user");
	
	//setcookie('userid', $token, time() + 60 * 60 * 24 * 7, '/' );
	
	
	//$loginquery = "SELECT "
	
	
}
else echo "Please go back and fill in all fields.";
?>