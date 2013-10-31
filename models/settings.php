<?php
	//Database Information

	$dbtype = "mysql"; 

	$db_host = "localhost";

	$db_user = "";

	$db_pass = "";
	$db_wallet_user = "username";
	$db_wallet_password = "password";
	$db_name = "testing";

	$db_port = "";

	$db_table_prefix = "userCake_";
	$db_wallet_user = "username";
	$db_wallet_password = "password";


	$langauge = "en";

	

	//Generic website variables

	$websiteName = "OpenEx";

	$websiteUrl = "http://openex.pw/"; //including trailing slash



	//Do you wish UserCake to send out emails for confirmation of registration?

	//We recommend this be set to true to prevent spam bots.

	//False = instant activation

	//If this variable is falses the resend-activation file not work.

	$emailActivation = false;



	//In hours, how long before UserCake will allow a user to request another account activation email

	//Set to 0 to remove threshold

	$resend_activation_threshold = 24;

	

	//Tagged onto our outgoing emails

	$emailAddress = "noreply@ffe4hjk7kb.tk";

	

	//Date format used on email's

	$emailDate = date("l \\t\h\e jS");

	

	//Directory where txt files are stored for the email templates.

	$mail_templates_dir = "models/mail-templates/";

	

	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");

	$default_replace = array($websiteName,$websiteUrl,$emailDate);

	

	//Display explicit error messages?

	$debug_mode = true;

	

	//---------------------------------------------------------------------------

?>
