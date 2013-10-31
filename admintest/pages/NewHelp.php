<?php
if(isUserAdmin($loggedInUser->display_username))
{
$bname = mysql_real_escape_string($_GET["pos"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Replyed to the Help question sent by $bname');
");
$to = mysql_real_escape_string($_GET['pos']);
$subject = mysql_real_escape_string($_GET['sub']);
$message = mysql_real_escape_string($_POST["message"]);
$full = "<b>This message has been sent to you from the Ask Us question you sent to us:</b><br><br> $message";
SendMessage($subject,$full,$to,"Ask Us");
header("Location:index.php?Page=Help");
}
?>