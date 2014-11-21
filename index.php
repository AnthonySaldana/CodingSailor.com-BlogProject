<?php
$tag="home";
$root = $_SERVER['DOCUMENT_ROOT'];
include_once($root . "/header.php");
echo<<<_headerhtml
<head>
<link rel="stylesheet" href="styles/index.css" type="text/css" />
<title>Coding Sailor</title>
<meta name='description' content='The coding sailor blog! A world of tech, help, and common sense'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div class="jumbotron imgcontainer" style="background-color:rgba(50,75,100,1);">
	<div class="container" style="color:white; margin-top:70px;">
		<div class="row">
		<div class="col-md-12">
		<center>
		
		<h1>Hello, i'm arbie</h1>
		<p>Welcome to the coding sailor! A blog that deals with tech and a dash
		of common sense.</p>
		</center>
		</div>
		</div>
	</div>
</div>

_headerhtml;

include_once($root . "/posts/current.php");
?>
<hr/>
<center><a href="posts/" class='h2'> View All Posts... </a></center>
<hr/>
<?php
include_once($root . "/footer.php");
?>
