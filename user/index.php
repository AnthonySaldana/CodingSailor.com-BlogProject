<?php
$tag="user";
$root = $_SERVER['DOCUMENT_ROOT'];
//require_once ($root . '/user/userclass.php');
include_once ($root . '/header.php');
if(isset($_POST['editprofilebutton']))
	{ 
		include_once ($root . '/user/editprofile.php');
		//this page is produced if the user clicks on edit profile. This will then show the page that allows
		//to edit the profile!
	}
	
else //if the edit button hasn't been pressed then run the next lines.
{
//checks if changes were submitted to profile page.
//if so, then it processes then, if not then it just
//passes through to the next section of code.
if(isset($_POST['submitchanges'])) 
{
    include_once($root . '/user/editprofileproccess.php');
}
    include_once ($root . '/user/profileview.php');

}
include_once ($root . '/footer.php');
?>