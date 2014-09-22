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
   
    $querystring = "SELECT * FROM comments WHERE blogid = '$blogid'";
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
        while ($i < $numrows)
        {  
            echo"<div class='row'>";
                echo"<div class='col-sm-8' style='border-bottom: solid 1px black;'>";
                $row = mysql_fetch_array($query);
                //row[0] is the comment id
                echo "<div class='col-sm-2'>" . $row[2] . "</div>";//user id
                echo "<div class='col-sm-8'> USERNAME<br/>" . $row[3] . "</div>";//comment
                echo "<div class='col-sm-2'>" . $row[4] . "</div>";//date
                $i++;
            echo"</div></div>";
        }
        echo "</div>";
        return true;
    }
 }
}
?>