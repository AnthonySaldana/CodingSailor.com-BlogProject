<?php
session_start();
if( isset($_SESSION['username']) and isset($_SESSION['password']) and !empty($_SESSION['username']) and !empty($_SESSION['password']))
{
?>

<div class="container">
 <div class="row">
  <div class="col-md-6">
   <form action="viewpost.php?postid=<?php echo $row[3]; ?>"  method="POST">
    <h3></h3>
	<div class="form-group">
     <textarea placeholder="Enter comment..." name="comment" class="form-control" rows="6"></textarea>
	</div>
	
	 <button type="submit" class="btn btn-info" name="sendcomment" value="send">Send</button>
   </form>
  </div>
 </div>
</div>
<br/>
<?php
}
else
{?>
<div class="container">
 <div class="row">
  <div class="col-md-12">
   <h2>Please log in to join this discussion.</h2>
  </div>
 </div>
</div>
<?php
}
$showcomment = new comments;
if(!$showcomment->showcomment($postid))
{
    echo "failed to retreive comments";
}
?>