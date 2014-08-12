<?php
require_once("../get_post.php");
$id = get_post('id');
$content = get_post('content');
echo<<<_htmleditsql
<form action="editpostprocess.php" method = "POST">
<textarea name="editcontent"cols="75" rows="10"> $content </textarea>
<input type="hidden" name="id" value="$id"/>
<input type="submit" name="submitedit" value="Submit Edit"/>
</form>
_htmleditsql
?>