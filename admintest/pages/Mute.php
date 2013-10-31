<?php
if(isUserAdmin($loggedInUser->display_username))
{
$bname = mysql_real_escape_string($_POST["User"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Muted the player $bname from the Chatroom');
");
$user = mysql_real_escape_string($_POST["User"]);
$fish = GetUserID($user);
mysql_query("UPDATE  `justin7674`.`Users` SET  `Mute` =  '1' WHERE  `Users`.`User_ID` = '$fish';");
header("Location:index.php?Page=Chat");
}
?>