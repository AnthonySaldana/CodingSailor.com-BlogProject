<?php

include_once("get_post.php");
require_once("loginform/secure/logindb.php");

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("couldn't connect: " . mysql_error());

mysql_select_db($db_database, $db_server)
	or die("unable to select database" . mysql_error());
if(isset ($_POST['delete']) && isset($_POST['id'] ) )
{
	$id = $_POST['id'];
	
	$query = "DELETE FROM blogpost WHERE id= '$id'";
	//mysql_query($query, $db_server);
	
	if(!mysql_query($query, $db_server))
	{
		echo "DELETE failed: $query" . mysql_error() . "</br></br>";
	}
}



if(isset($_POST['category']) && !empty($_POST['category']) 
&& isset($_POST['title']) && !empty ($_POST['title'])
&& isset($_POST['content']) && !empty($_POST['content']))
{
	$category = get_post('category');
	$title = get_post('title');
	$content = get_post('content');
	$currentdate = date('y/m/d');
	
	$query = "INSERT INTO blogpost(categoryid,title,content,dateofpost) values ('$category', '$title', '$content', '$currentdate')";
	if(!mysql_query($query,$db_server))
	{
		echo "INSERT failed: $query </br>" . mysql_error() . "</br> </br>";
	}
}
mysql_close($db_server);
header("Location: http://codingsailor.com/sqltestform.php");
?>