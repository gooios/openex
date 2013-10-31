<?php
if(isUserAdmin($loggedInUser->display_username))
{
if($_POST["name"] != "")
{
$bname = mysql_real_escape_string($_POST["name"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Created a group with the name of $bname');
");
$name = mysql_real_escape_string($_POST["name"]);
mysql_query("INSERT INTO `justin7674`.`Groups` (`Group_ID`, `Group_Name`) VALUES (NULL, '$name');");
}
header("Location:index.php?Page=Groups");
}
?>