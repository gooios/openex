<?php
if(isUserAdmin($loggedInUser->display_username))
{
$sub = mysql_real_escape_string($_GET['name']);
$to = mysql_real_escape_string($_GET['poster']);
StartBox("Send Help");
NewRow(array("Help<br><br><form action='Index.php?Page=NewHelp&sub=$sub&pos=$to' method='POST'>
Message: <textarea name='message'></textarea><br/><input type='submit'/>"));
EndBox();
}
?>