<?php
class comments
{
private $commentpost;
private $blogposted;
private $userposting;
private $today;

 function putval($properties)
 {
    $this -> commentpost = $properties[0];
	$this -> blogposted = $properties[1];
	$this -> userposting = $properties[2];
	$this -> today = $properties[3]; 
 }
 
 function printval(){ //test function. Just prints out values to make sure they were stored. for testing.
    echo $this->commentpost;
    echo $this->blogposted;
    echo $this->userposting;
    echo $this->today;
 }
 
 function insertval(){
    $query = "INSERT INTO comments (blogid, userid, comment, dateposted)
    VALUES('$this->blogposted', '$this->userposting', '$this->commentpost', '$this->today')";
    if(!mysql_query($query))
    {
        return false; //return false if insertion failed
    }
    else
    {
        return true; //return true if insertion was successful
    }
 }
 
 function showcomment($blogid){
   
    $querystring = "SELECT * FROM comments  LEFT JOIN user on user.id = comments.userid WHERE comments.blogid = '$blogid' ORDER BY commentid DESC";
    $query = mysql_query($querystring);
    if(!$query)
    {
        echo "getting false";
        return false; 
    }
    else
    {
        echo "<div class='container'>";
        $numrows = mysql_num_rows($query);
        $i = 0;
         $root = $_SERVER['DOCUMENT_ROOT'];
        while ($i < $numrows)
        {  
            //still need to update query to include username and img
            echo"<div class='row'>";
                echo"<div class='col-sm-8' style='border-bottom: solid 1px black;'>";
                $row = mysql_fetch_array($query);
                //row[0] is the comment id
                echo "<div class='col-xs-2'><img width='100%' src='/images/users/" . $row[10]/*img*/ . "'/><br/>" . $row[6]/*username*/ . "</div>";//user id
                echo "<div class='col-xs-8'> USERNAME<br/>" . $row[3] . "</div>";//comment
                echo "<div class='col-xs-2'>" . $row[4] . "</div>";//date
                $i++;
            echo"</div></div>";
        }
        echo "</div>";
        return true;
    }
 }
}
?>
