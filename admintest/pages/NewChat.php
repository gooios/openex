<?php
if(isUserAdmin($loggedInUser->display_username))
{
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Chatted through the server');
");
$mess = mysql_real_escape_string($_POST["message"]);
$fish = '<FONT COLOR="blue"><b>' .$mess . '</b></FONT>';
mysql_query("INSERT INTO `justin7674`.`Chat` (`Message`, `Posted`, `id`) VALUES ('<b>Server;</b> $fish', '', NULL);");
header("Location:index.php?Page=Chat");
}
?>