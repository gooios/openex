<?php
if(isUserAdmin($loggedInUser->display_username))
{
$to = mysql_real_escape_string($_GET['name']);
$fish = GetUserID($to);
mysql_query("UPDATE  `justin7674`.`Users` SET  `Mute` =  '0' WHERE  `Users`.`User_ID` = '$fish';");
header("Location:index.php?Page=Chat");
}
?>