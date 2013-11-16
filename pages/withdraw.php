<?php

require_once("models/config.php");
include("models/settings.php");
//require_once("models/jsonRPCClient.php");

if ($withdrawal_disabled === true) {
	header('Location: index.php?page=withdrawal_disabled');
	die();
}

//withdraw script here


?>