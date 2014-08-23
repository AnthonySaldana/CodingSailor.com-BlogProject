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
			<a class='list-group-item'>
			<h2 Class='list-group-item-heading'>$row[1]</h2>
			<p>$row[2]</p>
			<p>$row[4]</p></a>
			</div>
			</div>
			</div>
			</div>
_currentposts;
		}
?>