<?php
if(isUserAdmin($loggedInUser->display_username))
{
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Added a new filter to the site');
");
$find = mysql_real_escape_string($_POST["Find"]);
$replace = mysql_real_escape_string($_POST["Replace"]);
mysql_query("INSERT INTO `justin7674`.`Filter` (`Find`, `Replace`) VALUES ('$find','$replace');");
header("Location:index.php?Page=Posts");
}
?>