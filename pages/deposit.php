<?php
require_once("models/config.php");
include("models/settings.php");
//require_once("models/jsonRPCClient.php");


if ($deposit_disabled === true) {
	header ( 'Location: index.php?page=deposits_disabled' );
	die();
	}

if(!isUserLoggedIn()) 
{
	header('Location: access_denied.php');
	die(); 
}
	
$id = mysql_real_escape_string($_GET["id"]);

$sql = mysql_query("SELECT * FROM currencies WHERE `id`='$id'");

$coin = mysql_result($sql,0,"Acronymn");

$ip = mysql_result($sql,0,"ip");

$port = mysql_result($sql,0,"port");



$bitcoin = establishRPCConnection($ip,$port);



echo "<h3>Your deposit address is: </h3>";

echo $bitcoin->getaccountaddress($loggedInUser->display_username);


?>
