<?php
$tag="home";
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/header.php");
echo<<<_headerhtml
<head>
<link rel="stylesheet" href="styles/index.css" type="text/css" />
<title>Coding Sailor</title>
<meta name='description' content='The coding sailor blog! A world of tech, help, and
my life - arbie'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div class="jumbotron" style="background-color:rgba(50,75,100,1); height:400px;">
<div class="imgcontainer">
	<div class="container" style="color:white; margin-top:70px;">
		<center><h1>Hello, i'm arbie</h1>
		<p>Welcome to the coding sailor! A blog that deals with tech and a dash
		of common sense.</p>
	</div>
</div>
</div>
_headerhtml;

include_once($root . "/posts/current.php");
include_once($root . "/footer.php");
?>