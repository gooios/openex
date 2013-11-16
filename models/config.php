<?php
/*    Main Feature Config     */

//Site Title
$title="OpenEx";

//maintenance
$maintenance = false;
$maint_url = "system/maintenance.html";

//Login/Registration
$login_disable = false;
$registration_disable = true;

//deposits
$deposit_disabled = true;

//withdrawals
$withdrawal_disabled = true;

//registration disabled message
$registration_message = "<b>Registrations are currently disabled.</b></br>However you can login with a test username if you like.</br><h4>Test Users</h4><h5>format: user | pass </h5>";

//Test usernames displayed(if message enabled)
$testnamepair1 ="<h6>test123 | 12345678</h6>";
$testnamepair2 ="<h6>test2 | password</h6>";
$testnamepair3 ="<h6>test5 | password</h6>";
$testnamepair4 ="<h6>TraderBob | 12345678</h6>";

/*   End Main Feature Config    */

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
