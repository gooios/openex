<?php
if(isUserAdmin($loggedInUser->display_username))
{
mysql_query("DELETE FROM `Replies` WHERE Post = '" . mysql_real_escape_string($_GET["text"]) . "'");
header("Location:index.php?Page=Posts");
}
?>