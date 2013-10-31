<?php
if(isUserAdmin($loggedInUser->display_username))
{
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Cleared the chatroom');
");
$time = date('h:i:s',time());
$user = $loggedInUser->display_username;
mysql_query("TRUNCATE TABLE Chat");
mysql_query("INSERT INTO `Chat` (`Message`, `Posted`) VALUES('The chatroom was cleared by $user', '$time')");
header("Location:index.php?Page=Chat");
}
?>