<?php
class userloginreg{
 public $user;
 public $pw;
 public $token;
 public $email;
 public $datejoined;
 
     function __construct($username, $password){
        $this->user = $username;
        $this->pw = "%^&PenBand3721" . $password . "*3721%Arbie^7494" ;
        $this->token = sha1($this->pw);
        }//end of construct
        
     public function dupemail($emailinp){ //checks for duplicate email. emailinput is what that stands for.
        $duplicatequery = mysql_query("SELECT 1 FROM user where email = '$emailinp'"); //check for duplicate email
        if (mysql_num_rows($duplicatequery) == 0 )
        {
            $error = false; //assign false to error. Will be checking for this when calling this function.
            $this->email = $emailinp;
            return $error;
        }
         else
         {
            $error = true;
            return $error;
         }
        }//end of dupemail()

     public function dupuser(){ //checks for duplicate username
        $duplicatequery2 = mysql_query("SELECT 1 FROM user where username = '$this->user'"); //check for duplicate username
        //return true false if no error, return true if there is an error.
        if (mysql_num_rows($duplicatequery2) == 0 )
        {
            $error = false;
            return $error;
        }
         else{
            $error = true;
            return $error;
         }
        }

     public function newuserquery(){ //writes and runs the query responsible for setting up the new user.
        $this->datejoined = date('y/m/d');
        $signupquery = "INSERT INTO user(username, password, email, datejoined) 
        VALUES('$this->user', '$this->token', '$this->email' , '$this->datejoined')"; 
        //insert username, pw, email, and join date into the appropriate columns
        
        $result = mysql_query($signupquery);
        if(!result) //if the query fails throw an error
         {
          die("error signing up");
         }
        $getuserinfoquery = "SELECT * FROM user WHERE username = '$this->user'";
        
        $content = mysql_query($getuserinfoquery);
        if(!$content) //if the query fails, throw an error
         {
          die("couldn't get user information");
         }
        
        elseif (mysql_num_rows($content))
         {		
            $contentrows = mysql_fetch_row($content);
            $defaultabout = "Hello my name is $this->user";
            $userid = $contentrows[0];
            $secondquery = "INSERT INTO userinfo(id, aboutme)
            VALUES ('$userid', '$defaultabout')";
            $result = mysql_query($secondquery);
            if(!$result) die("point 2, but failed.");
            //echo "signed up";
         }
        }//end of newuserquery() function
    
}/*end of class*/?>