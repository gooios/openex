<br/>
<br/>
<?php
if(isUserAdmin($loggedInUser->display_username))
{
$sql = mysql_query("SELECT * FROM Groups");
$num = mysql_num_rows($sql);
StartBoxA("Threads");
NewRowA(array("Name","ID","Delete","Settings"));
for($i = 0;$i < $num; $i++)
{
$name = mysql_result($sql,$i,"Group_Name");
if ($name != "Warned")
{
$id = mysql_result($sql,$i,"Group_ID");
NewRowA(array($name,$id,"<a href=\"index.php?Page=DeleteGroup&id=$id\">Delete</a>","<a href=\"index.php?Page=GroupSettings&id=$id\">Settings</a>"));
}
}
EndBoxA();
?>
<br/>
<br/>
<?php
StartBoxA("New Group");
NewRowA(array("New Group<br><br><form action='index.php?Page=NewGroup' method='POST'>Name: <input type='text' name='name'/><input type='submit'/>"));
EndBoxA();
}
?>