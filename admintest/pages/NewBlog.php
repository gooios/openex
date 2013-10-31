<?php
if(isUserAdmin($loggedInUser->display_username))
{
$bname = mysql_real_escape_string($_POST["name"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Created a new blog with the name of $bname');
");
$text = mysql_real_escape_string($_POST["text"]);
$name = mysql_real_escape_string($_POST["name"]);
$iname = mysql_real_escape_string($_POST["iname"]);
$image = mysql_real_escape_string($_POST["image"]);
$user = $loggedInUser->display_username;
mysql_query("INSERT INTO  `justin7674`.`Blog` (`Name` ,`Image` ,`Text` ,`Poster` ,`IName` ,`ID`)VALUES ('$name','$image', '$text',  '$user',  '$iname', NULL);");
header("Location:index.php?Page=Blog");
}
?>