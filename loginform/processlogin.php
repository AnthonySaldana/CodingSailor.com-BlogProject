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
    
	if(isset($_POST['signup']))//run this if the the signup button was clicked. If sign in was clicked, skip it.
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
	}//end of registration process, if chosen
    
        if(!$userlogin->getuser)
		{
			if(!$userlogin->checkpw())
				{
                    $userlogin->login();
				}
			else die("invalid username/ password combination token");
		}//end of login process, which is called no matter what.
		else die("invalid username/ password combination user");
	//setcookie('userid', $token, time() + 60 * 60 * 24 * 7, '/' );	
}
else echo "Please go back and fill in all fields.";
?>