<?php
if(isUserAdmin($loggedInUser->display_username))
{
$ip = mysql_real_escape_string($_GET['name']);
$id = mysql_real_escape_string($_GET['id']);
mysql_query("UPDATE  `justin7674`.`Users` SET  `Banned` =  '1' WHERE  `Users`.`User_ID` =$id LIMIT 1 ;");
header("Location:Index.php?Page=EditUser&id=$id");
}
?>
