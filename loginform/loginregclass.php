<?php
class userloginreg{
 public $user;
 public $pw;
 public $token;
 public $email;
 public $datejoined;
 private $getuserquery;
 
     function __construct($username, $password){
        $this->user = $username;
        $this->pw = "%^&PenBand3721" . $password . "*3721%Arbie^7494" ;
        $this->token = sha1($this->pw);
        }//end of construct
        
     private function getuserquery(){ //runs the query to get user
        $this->getuserquery = "SELECT * FROM user WHERE username = '$this->user'";
        $result = mysql_query($this->getuserquery);
        $row = mysql_fetch_row($result);
        if($row)
        {
            return $row;
        }
     } // end of getuserquery() function
     
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
    }//end of dupuser() function

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
         }
    }//end of newuserquery() function
    
    public function getuser(){
        $this->getuserquery();
		$result = mysql_query($this->getuserquery);
		if(!$result) 
        {
            $error = true;
            return $error;
		}
		elseif (mysql_num_rows($result))
        {
            $error = false;
            return $error;
        }
        else{
            $error = true;
            return $error;
        }
    }//end of getuser() function
    
    public function checkpw(){
        $row = $this->getuserquery();
		if($this->token == $row[2])
        {
            $error = false;
        }
        else
        {
            $error = true;
        }return $error;
    }//end of checkpw() function
    
    public function login(){
        $row = $this->getuserquery();
        session_start();
        $id = $row[0];
        $_SESSION['username'] = $this->user;
        $_SESSION['password'] = $this->token;
        $_SESSION['id'] = $id;
        //echo"login successful";
        header("Location: http://codingsailor.com");
    }//end of login() function
}/*end of class*/?>