<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/header.php");
echo<<<_headerhtml
<title>Coding Sailor</title>
<meta name='description' content='The coding sailor blog! A world of tech, help, and
my life - arbie'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<div class="jumbotron" style="background-color:rgba(50,75,100,1);">
	<div class="container" style="color:white;">
		<center><h1>Hello, i'm arbie</h1>
		<p>Welcome to the coding sailor! A blog that deals with tech and a dash
		of common sense.</p>
	</div>
</div>
_headerhtml;

include_once($root . "/posts/current.php");
include_once($root . "/footer.php");
?>