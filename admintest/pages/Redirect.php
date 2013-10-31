<?php
if(isUserAdmin($loggedInUser->display_username))
{
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Successfully logged into the ACP');
");
header("Location: Index.php?Page=Board&p=0");
}else{
StartBox("No");
NewRow(array("You have no right to the ACP"));
EndBox();
}
?>