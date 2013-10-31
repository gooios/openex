<br/>
<br/>
<?php
if(isUserAdmin($loggedInUser->user_id))
{
$sql = mysql_query("SELECT * FROM Help");
$num = mysql_num_rows($sql);
StartBoxA("Chats");
NewRowA(array("Subject", "By", "Message", "Delete", "Reply"));
for($i = 0;$i < $num; $i++)
{
$name = mysql_result($sql,$i,"Name");
$mess = mysql_result($sql,$i,"Message");
$poster = mysql_result($sql,$i,"Poster");
NewRowA(array($name,$poster,$mess,"<a href=\"index.php?Page=DeleteHelp&Name=$name\">Delete</a>","<a href=\"index.php?Page=SendHelp&name=$name&poster=$poster\">Reply</a>"));
}
EndBoxA();
}
?>