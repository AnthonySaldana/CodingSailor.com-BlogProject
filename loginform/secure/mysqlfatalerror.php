<?php
function mysql_fatal_error ($error_msg)
{
	$msgerrormain = mysql_error();
	echo<<<_END
	We are sorry, but it was not possible to complete the requested task. The error message received was:
	<p> $error_msg: $msgerrormain</p>
	Please click the back button and try again.If you are still having problems
	<a href="mailto:anthonysaldana@leafyweb.com">email our administrator. </a>
	</br>thank you. </br>
_END;
}
?>