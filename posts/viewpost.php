<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/header.php';
require_once($root . '/loginform/secure/logindb.php');
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!db_server) 
	{
	$msg = "could not connect to database. login failed";
	die(mysql_fatal_error($msg));
	}
	mysql_select_db($db_database, $db_server)
	or die("database error");
	$postid = $_GET['postid'];
$latestquery = "SELECT * FROM blogpost WHERE id = $postid";
$resultcurrent=mysql_query($latestquery);
if(!$resultcurrent) die("couldnt read posts");
$row = mysql_fetch_row($resultcurrent);
echo<<<_currentposts
		<div class='container'>
			<div class='row'>
				<div class='col-md-12'>
					<div class='list-group'>
						<a href='/posts/viewpost.php?postid=$row[3]' class='list-group-item'>
						<h2 Class='list-group-item-heading'>$row[1]</h2>
						<p>$row[2]</p>
						<p>$row[4]</p></a>
					</div>
				</div>
			</div>
		</div>
_currentposts;
include_once $root . '/footer.php';
?>
