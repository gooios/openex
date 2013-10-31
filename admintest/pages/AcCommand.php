<?php
if(isUserAdmin($loggedInUser->display_username))
{
$time = date('h:i:s',time());
$user = $loggedInUser->display_username;
if(isUserAdmin($loggedInUser->display_username))
{
$mess = mysql_real_escape_string($_POST["message"]);
$chatshort = substr($mess, 0, -5);
if($mess == "clear/chat")
{
mysql_query("TRUNCATE TABLE Chat");
mysql_query("INSERT INTO `Chat` (`Message`, `Posted`) VALUES('The chatroom was cleared by $user', '$time')");
}elseif ($mess == "clear/users")
{
mysql_query("TRUNCATE TABLE Users");
}else{
$fish = '<FONT COLOR="blue"><b>' .$mess . '</b></FONT>';
mysql_query("INSERT INTO `justin7674`.`Chat` (`Message`, `Posted`, `id`) VALUES ('<b>Server;</b> $fish', '', NULL);");
}
}
}
?>