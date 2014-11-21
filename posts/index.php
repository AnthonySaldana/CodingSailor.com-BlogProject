<head>
    <title>Coding Sailor Blog Posts</title>
</head>
<?php
$tag = "posts";
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/header.php");
echo"<br/><center><h1 class='h2'>All Coding Sailor Blog Posts</h1></center> <hr/>";
include_once($root . "/posts/current.php");
include_once($root. "/footer.php");
?>
