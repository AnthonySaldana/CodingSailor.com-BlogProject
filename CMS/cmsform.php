<?php
$tag="cms";
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "/loginform/secure/logindb.php");
include_once($root . "/header.php");
session_start();
echo"<title>CMS</title>
<meta name='description' content='The CMS for the coding sailor blog'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
if(isset($_SESSION['username']))
	{
		
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$email = $_SESSION['email'];
				
			//check if login is admin
		if($username == "admin")
			{
		echo<<<_sqltesthtml
		<div class='containter'>
			<div class='row'>
			<div class='col-md-6'>
			<div class='list-group'>
			
			<a href='#' class='list-group-item'>
			<h2 Class='list-group-item-heading'>Post Entry</h2>
		<form action="mainprocess.php" method="post">
		<table width = "500px">
		<tbody>
			<tr>
		<!-- fill in category here -->
				<td>
				<label for="category"> Category </label>
				</td>
				<td>
				<select name="category">
				<option name="tech" value="1">Tech</option>
				<option name="web" value="2">Web</option>
				<option name="life" value="3">Life</option>
				<option name="selfdev" value="4">Self Development</option>
				</td>
			</tr>
			
		<!-- title goes here -->
			<tr>
				<td>
					<label for="title"> Title </label>
				</td>
				<td>
					<input type ="text" name="title" placeholder="title here">
				</td>
			</tr>

		<!-- blog content goes into this part of the form -->
			<tr>
				<td>
					<label for="content"> Content </label>
				</td>
				<td>
					<textarea name="content" cols="75" rows="10" placeholder="Blog Post goes here!"></textarea>
				</td>
			</tr>

		<!-- submit data -->
			<tr>
				<td>
					<input type="submit" value="submit"/>
				</td>
			</tr>
		</tbody>
		</table>
		</form>
		
		</a>
			
			</div>
			</div>
			</div>
			</div>
_sqltesthtml;

		$db_server = mysql_connect($db_hostname, $db_username, $db_password);
		if (!$db_server) die("couldn't connect: " . mysql_error());

		mysql_select_db($db_database, $db_server)
			or die("unable to select database" . mysql_error());
			
		$query="SELECT * FROM blogpost";
		$result = mysql_query($query);

		if(!$result) die("couldnt establish query");
		$rows=mysql_num_rows($result);


		for($j=0; $j < $rows; ++$j)
		{
			
			
			$row = mysql_fetch_row($result);
			echo<<<_format
			<div class='containter'>
			<div class='row'>
			<div class='col-md-6'>
			<div class='list-group'>
			
			<a href='#' class='list-group-item'>
			<h2 Class='list-group-item-heading'>$row[1] Post Details</h2>
_format;
			echo<<<_blogpostquery
			
				Category: $row[0] </br>
				$row[2] </br>
				ID: $row[3] </br>
				Date: $row[4] </br>
			<!--excuse my half-fast presentation here. -->
			<form action="mainprocess.php" method="POST" style = "display:inline-block; vertical-align:top;">
				<input type="hidden" name="delete" value="yes" "/>
				<input type="hidden" name="id" value="$row[3]"/>
			<input type="submit" name="delete" value="DELETE"/>
			</form>
			<form action="editpost.php" method="POST" style = "display:inline-block; vertical-align:top;">
			<input type = "hidden" name ="id" value = "$row[3]"/>
			<input type = "hidden" name = "content" value = "$row[2]"/>
			<input type = "hidden" name = "title" value = "$row[1]"/>
			<input type = "submit" name="edit" value="EDIT"/>
			</form>

_blogpostquery;

echo<<<_finishformat
</a>
			
			</div>
			</div>
			</div>
			</div>
_finishformat;
		}

		mysql_close($db_server);
}

else die("only admin allowed");
}


?>