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
}
?>