<?php
//echo "THE WHOLE TRADE SITE WILL BE RESETING ALL TRADES";
if($_SERVER['REMOTE_ADDR'] != "")
{
//die("After long thought I have decided to discontinue IceyCrypt. If you wish to have your money back just send an email to support@script-it.net with your account name. Be sure you email me from the email that you created the account with otherwise you will not get your money back!");
}

date_default_timezone_set('America/New_York');


	/*

		UserCake Version: 1.4

		http://usercake.com

		

		Developed by: Adam Davis

	*/



	if(is_dir("install/"))

	{

		header("Location: install/");

		die();

	}

	

	require_once("settings.php");



	//Dbal Support - Thanks phpBB ; )

	require_once("db/".$dbtype.".php");

	

	//Construct a db instance

	$db = new $sql_db();

	if(is_array($db->sql_connect(

							$db_host, 

							$db_user,

							$db_pass,

							$db_name, 

							$db_port,

							false, 

							false

	))) {

		die("Unable to connect to the database");

	}

	

	if(!isset($language)) $langauge = "en";


	require_once("lang/".$langauge.".php");

	require_once("class.user.php");

	require_once("class.mail.php");

	require_once("funcs.user.php");

	require_once("funcs.general.php");

	require_once("class.newuser.php");
require_once("models/jsonRPCClient.php");
 function establishRPCConnection($ip,$port)

 {
                $db_wallet_user = 'username';
                $db_wallet_password = 'password';
  $bitcoin = new jsonRPCClient('http://'.$db_wallet_user.':'.$db_wallet_password.'@' . $ip . ':' . $port );
  return $bitcoin;

 }
session_start();

	

	

	//Global User Object Var

	//loggedInUser can be used globally if constructed

	if(isset($_SESSION["userCakeUser"]) && is_object($_SESSION["userCakeUser"]))

	{

		$loggedInUser = $_SESSION["userCakeUser"];

	}

?>
