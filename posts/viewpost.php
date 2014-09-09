<?php
$tag = "posts";
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
		<div class='container' style="margin-top:20px; margin-bottom:20px;">
			<div class='row'>
				<div class='col-md-8'>
					<div class='list-group'>
						<h1>$row[1]</h1>
						<p class="h4" style="line-height:150%;">$row[2]</p>
						<p>$row[4]</p></a>
						<br/>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://codingsailor.com/posts/viewpost.php?postid=$postid" data-via="anthonysaldana3">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
				</div>
				
			</div>
		</div>
_currentposts;
include_once $root . '/footer.php';
?>
