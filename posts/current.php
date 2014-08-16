<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/loginform/secure/logindb.php');
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!db_server) 
	{
	$msg = "could not connect to database. login failed";
	die(mysql_fatal_error($msg));
	}
	mysql_select_db($db_database, $db_server)
	or die("database error");
	
$latestquery = "SELECT * FROM blogpost";
$resultcurrent=mysql_query($latestquery);
if(!$resultcurrent) die("couldnt read posts");
		$rows=mysql_num_rows($resultcurrent);
		for($j=0; $j<$rows; $j++)
		{
			$row = mysql_fetch_row($resultcurrent);
	echo<<<_currentposts
			<div class='containter'>
			<div class-'row'>
			<div class='col-md-12'>
			<div class='list-group'>
			<a href='#' class='list-group-item'>
			<h2 Class='list-group-item-heading'>$row[1]</h2>
			<p>$row[2]</p>
			<p>$row[4]</p></a>
			</div>
			</div>
			</div>
			</div>
_currentposts;
		}
$test = "<div class='containter'>
<div class-'row'>
	<div class='col-md-6'>
		<div class='list-group'>
			<center><a href='#' class='list-group-item'>
			<h3Class='list-group-item-heading'>Hello World</h3>
			<p>Want to take a break from studying? Want to play your 
favorite videogame? Or how about a game of pool with your friends? If that's the case, the 
GamesRoom is perfect for you! The GamesRoom is located in the Mub and is open 
everyday!</p></a></center>
		</div>
	</div>
</div>
</div>"
?>