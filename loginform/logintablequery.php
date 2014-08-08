<?php
$query = "SELECT * FROM user";
$result = mysql_query($query);
if (!result) 
	{
		$errormsg="Failed to complete query"; 
		die (mysql_fatal_error($errormsg));
	}
	
$rows = mysql_num_rows($result);
for ($j = 0; $j < $rows; $j++)
{
	$row = mysql_fetch_row($result);
	echo 'ID:	' . $row[0] . '</br>';
	echo 'UN:	' . $row[1] . '</br>';
	echo 'PW:	' . $row[2] . '</br>';
	echo 'email:' . $row[3] . '</br>';
	echo '</br>';
}


?>