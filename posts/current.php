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
	
$latestquery = "SELECT * FROM blogpost ORDER BY id DESC";
$resultcurrent=mysql_query($latestquery);
if(!$resultcurrent) die("couldnt read posts");
		$rows=mysql_num_rows($resultcurrent);
		echo"<div class='container'>
			<div class='row'>";
		for($j=0; $j<$rows; $j++)
		{
			$row = mysql_fetch_row($resultcurrent);
			$postcontent = substr($row[2], 0, 300) . "...";
	echo<<<_currentposts
				<div class='col-md-4'>
					<div class='list-group'>
						<a href='/posts/viewpost.php?postid=$row[3]' class='list-group-item currentpost'>
						<h2 Class='list-group-item-heading'>$row[1]</h2>
						<p>$postcontent</p>
						<p>$row[4]</p></a>
					</div>
				</div>
_currentposts;
		}
echo "</div> </div>";
?>