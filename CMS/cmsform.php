<?php
require_once("../loginform/secure/logindb.php");
session_start();
if(isset($_SESSION['username']))
	{
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$email = $_SESSION['email'];
				echo "<p> Hello $username.</p>";
				echo "<a href='../loginform/logout.php'>Logout</a>";
				
		echo<<<_sqltesthtml
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
					<input type ="text" name="title"/ placeholder="title here">
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
			echo<<<_blogpostquery
			<pre >
				Category: $row[0]
				title...: $row[1]
				<span style= "max-width:500px;white-space:normal;">Content.: $row[2]</span>
				ID......: $row[3]
				Date....: $row[4]</pre>
			<!--excuse my half-fast presentation here. -->
			<form action="mainprocess.php" method="POST" style = "display:inline-block; vertical-align:top;">
				<input type="hidden" name="delete" value="yes" "/>
				<input type="hidden" name="id" value="$row[3]"/>
			<input type="submit" name="delete" value="DELETE"/>
			</form>
			<form action="editpost.php" method="POST" style = "display:inline-block; vertical-align:top;">
			<input type = "hidden" name ="id" value = "$row[3]"/>
			<input type = "hidden" name = "content" value = "$row[2]"/>
			<input type = "submit" name="edit" value="EDIT"/>
			</form>

_blogpostquery;
		}

		mysql_close($db_server);
}

else die("only admin allowed");
?>