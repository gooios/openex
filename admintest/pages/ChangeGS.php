<?php
if(isUserAdmin($loggedInUser->user_id))
{
$id = mysql_real_escape_string($_GET['id']);
$da = mysql_real_escape_string($_POST["Avatar"]);
$lolna = GetGroupFromId($id);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Edited the User Group with the name of $lolna');
");
if(isset($_POST['CanPost']) &&
   $_POST['CanPost'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Post` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Post` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanView']) &&
   $_POST['CanView'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `View` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `View` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanEdit']) &&
   $_POST['CanEdit'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Edit` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Edit` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanDelete']) &&
   $_POST['CanDelete'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Delete` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Delete` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanBan']) &&
   $_POST['CanBan'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Ban` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Ban` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanClean']) &&
   $_POST['CanClean'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Clean` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Clean` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanChat']) &&
   $_POST['CanChat'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Chat` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Chat` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['CanMrp']) &&
   $_POST['CanMrp'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Moderate` =  '1' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Moderate` =  '0' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
if(isset($_POST['PI']) &&
   $_POST['PI'] == 'Yes')
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Avatar` =  '$da' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
else
{
    mysql_query("UPDATE  `justin7674`.`Permissions` SET  `Avatar` =  '' WHERE  `Permissions`.`Group_ID` = '$id' LIMIT 1 ;");
}
header( "Location: http://www.luacore.co/LuaCore/secadmin/Index.php?Page=GroupSettings&id=$id" ) ;
}
?>