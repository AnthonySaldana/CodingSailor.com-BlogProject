<?php
require_once ($root . '/user/userclass.php');
$user =  new user;
$test = $user->username;
print_r($user);
?>