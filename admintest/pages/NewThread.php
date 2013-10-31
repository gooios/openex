<?php
if(isUserAdmin($loggedInUser->user_id))
{
if($_POST["name"] != "")
{
$tname = mysql_real_escape_string($_POST["tname"]);
$pass = mysql_real_escape_string($_POST["pass"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Created a new thread with the name of $name');
");
$des = mysql_real_escape_string($_POST["desc"]);
$cat = mysql_real_escape_string($_POST["cat"]);
mysql_query("INSERT INTO Thread (Name,Description,Category,Password)
VALUES ('$tname', '$des','$cat','$pass')");
}
header("Location:index.php?Page=Threads");
}
?>