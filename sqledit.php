<?php

$id = $_POST['id'];
$content = $_POST['content'];
echo<<<_htmleditsql
<form action="sqleditfinish.php" method = "POST">
<textarea name="editcontent"cols="75" rows="10"> $content </textarea>
<input type="hidden" name="id" value="$id"/>
<input type="submit" name="submitedit" value="Submit Edit"/>
</form>
_htmleditsql
?>