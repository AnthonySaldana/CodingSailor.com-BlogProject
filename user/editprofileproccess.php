<?php
require_once ($root . '/user/userclass.php');
$user = new user;
$user->username = $_POST['usernameedit'];
$rawpw = $_POST['passwordedit'];
$presalt = "%^&PenBand3721";
$postsalt = "*3721%Arbie^7494";
$salt = $presalt . $rawpw . $postsalt;
$token = sha1($salt);
$user->password = $token;
$user->useremail = $_POST['emailedit'];
//$this->userimg = $row[5];
//row 6 is equal to the userid. Used to link tables.
$user->realname = $_POST['nameedit'];
$user->usercity = $_POST['cityedit'];
$user->userstate = $_POST['stateedit'];
$user->usercountry = $_POST['countryedit'];
$user->userwebsite = $_POST['websiteedit'];
$user->dateofbirth = $_POST['birthedit'];
$user->userabout = $_POST['editabout'];
$user->editprofile();
?>