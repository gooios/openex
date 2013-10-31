<?php
//require_once("models/jsonRPCClient.php");
include("models/settings.php");
	
$id = mysql_real_escape_string($_GET["id"]);

$sql = mysql_query("SELECT * FROM currencies WHERE `id`='$id'");

$coin = mysql_result($sql,0,"Acronymn");

$ip = mysql_result($sql,0,"ip");

$port = mysql_result($sql,0,"port");



$bitcoin = establishRPCConnection($ip,$port);



echo "<h3>Your deposit address is: </h3>";

echo $bitcoin->getaccountaddress($loggedInUser->display_username);




?>
