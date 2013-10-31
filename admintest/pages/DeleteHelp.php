<?php
if(isUserAdmin($loggedInUser->display_username))
{
$bname = mysql_real_escape_string($_GET["Name"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Deleted the Help Suggestion named $bname');
");
mysql_query("DELETE FROM Help WHERE Name = '" . mysql_real_escape_string($_GET["Name"]) . "'");
header("Location:index.php?Page=Help");
}
?>