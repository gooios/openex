<?php

if(isUserAdmin($loggedInUser->display_username))
{
if(isset($_POST["User"]))
{
$user = mysql_real_escape_string($_POST["User"]);
$daid = getIdFromUser($user);
header("Location: Index.php?Page=EditUser&id=$daid");
}

}
?>
<?
if(isUserAdmin($loggedInUser->display_username))
{
StartBoxA("Search");
NewRowA(array("<form action='index.php?Page=Users' method='POST'>
<input type='text' name='User'/>
<input type='submit'/>
</form>"));
EndBoxA();
StartBoxA("Member List");
NewRowA(array('#','User','Posts','Comments'));
$sql = mysql_query("SELECT * FROM Users");
$num = mysql_num_rows($sql);
for($i=0;$i<$num;$i++)
{
$user = mysql_result($sql,$i,"Username");
$join = mysql_result($sql,$i,"SignUpDate");
$posts = mysql_result($sql,$i,"Posts");
$id = mysql_result($sql,$i,"User_ID");
$comments = GetComments($id);
NewRowA(array($id,"<a href=\"Index.php?Page=EditUser&id=" . $id . "\" >" . $user . "</a>",$posts,$comments));
}
EndBoxA();
}
?>

getUserFromId($id)