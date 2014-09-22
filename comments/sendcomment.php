<?php
$comproperties = array();
$comproperties[0] = $_POST['comment']; //comment stored here
$comproperties[1] = $postid;//blogid stored here
session_start();
$comproperties[2] = $_SESSION['id'];
$comproperties[3] = date('y/m/d');

$newcomment = new comments;
$newcomment -> putval($comproperties);
//$newcomment -> printval();//testing function
if($newcomment->insertval())
{
    $error="comment posted";
    echo"<script type='text/javascript'>alert('$error');</script>";
}
else
{
    $error="failed to post comment";
    echo"<script type='text/javascript'>alert('$error');</script>";
}
?>