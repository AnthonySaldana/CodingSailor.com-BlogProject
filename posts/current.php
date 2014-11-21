<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/db/loginclass.php');//REMINDER, put db connection into its own class!!!!
$connect = new logindb(); // connect to db using loginclass
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (false !== strpos($url,'posts')) {
    $latestquery = "SELECT * FROM blogpost ORDER BY id DESC";
} else {
    $latestquery = "SELECT * FROM blogpost ORDER BY id DESC LIMIT 0,6";
}
 //get all the blog posts by descend order.
$resultcurrent=mysql_query($latestquery); //put query in variable
if(!$resultcurrent) die("couldnt read posts"); //if it runs move on, if not,  throw error. puts the result into $resultcurrent
$rows=mysql_num_rows($resultcurrent); // assign the NUMBER of rows the $rows variable

		echo"<div class='container'>";// start of the container
		for($p=0; $p<$rows;) //echo the layout for each blog post. Should be 3 posts per row. the j is incremented after 
							// every column in the for loop below. j is just a counter for each post.
		{
			echo "<div class='row'>";
			for($col=0; $col <3; $col++)//after every 3 columns, end this row.
			{
				if($p == $rows){ //check if the counter is equal to the amount of posts. If it is then break out of the loop and move on.
					continue;
				}
			$row = mysql_fetch_row($resultcurrent); //get the current row in the table.
			$postcontent = substr($row[2], 0, 300) . "..."; //cut each preview to a max of 300 characters
															//also gets the blog content for the current row.
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
				$p++;
			}
			echo "</div>";
		}
echo "</div>"; //end of the container
?>
