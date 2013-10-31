<?phprequire_once("models/config.php");
include("disablefeaturesconfig.php");if($registration_disable === true)//absolute match of boolean. we need no if false statement{    header("Location: index.php?page=closed");	die();}	
if(!empty($_POST))
{
		$errors = array();
		$email = trim($_POST["email"]);
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$confirm_pass = trim($_POST["passwordc"]);
	
		//Perform some validation
		//Feel free to edit / change as required
		
		if(minMaxRange(5,25,$username))
		{
			$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
		}
		if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
		{
			$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
		}
		else if($password != $confirm_pass)
		{
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		if(!isValidEmail($email))
		{
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		//End data validation
		if(count($errors) == 0)
		{	
				//Construct a user object
				$user = new User($username,$password,$email);
				
				//Checking this flag tells us whether there were any errors such as possible data duplication occured
				if(!$user->status)
				{
					if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
					if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
				}
				else
				{
					//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)$errors[] = "Successfully registered! Please go back to the login page to login!";
					if(!$user->userCakeAddUser())
					{
						
					}				}
		}
	}
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head><style>input[type="text"], input[type="password"]{	width: 210px;}input[type="submit"]{	background: #dadada;	color:#00000 !important;	display:inline-block;	font-size:13px;	height:22px;	text-align:center;	text-shadow:1px 1px 0 rgba(255, 255, 255, 0.4);	width:210px;	margin:0;	opacity: 0.533;	border: 1px solid #A1DBFF;	border-radius: 2.5px;	-webkit-border-radius: 2.5px;	-moz-border-radius: 2.5px;	-o-border-radius: 2.5px;	-ms-border-radius: 2.5px;}input[type="submit"]:hover{		border:none !important;	color:#516D7F !important;	display:inline-block;	font-size:13px;	height:22px;	text-align:center;	text-shadow:1px 1px 0 rgba(255, 255, 255, 0.4);	width:210px;	margin:0;	cursor:pointer;	border: 1px solid #A1DBFF;	border-radius: 2.5px;	-webkit-border-radius: 2.5px;	-moz-border-radius: 2.5px;	-o-border-radius: 2.5px;	-ms-border-radius: 2.5px;	background: -moz-linear-gradient(top,  #feffff 0%, #d2ebf9 100%);	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#feffff), color-stop(100%,#d2ebf9));	background: -webkit-linear-gradient(top,  #feffff 0%,#d2ebf9 100%);	background: -o-linear-gradient(top,  #feffff 0%,#d2ebf9 100%);	background: -ms-linear-gradient(top,  #feffff 0%,#d2ebf9 100%);	background: linear-gradient(to bottom,  #feffff 0%,#d2ebf9 100%);}#strength {	width: 200px;	height: 12px;	border: 1px solid #000;	border-radius: 1px;	-webkit-border-radius: 1px;	-moz-border-radius: 1px;	-o-border-radius: 1px;	-ms-border-radius: 1px;	padding: 1 1 1 1px;	opacity}#passwordStrength{	height:10px;	display:block;	float:left;}	.strength0{	width:200px;	background:#CCCCCC;	opacity:.5;}.strength1{	width:30px;	background:#3B0B0B;	border-right:1px solid #000;}.strength2{	width:50px;	background:#FF0000;	border-right:1px solid #000;}.strength3{	width:60px;	background:#FE9A2E;	border-right:1px solid #000;}.strength4{	width:80px;		background:#FF5F5F;	border-right:1px solid #000;}.strength5{	width:120px;	background:#56E500;	border-right:1px solid #000;}.strength6{	background:#4DCD00;	width:200px;	border-right:1px solid #000;}.strength7{	background:#399800;	width:170px;	border-right:1px solid #000;	box-shadow: 0 0 18px #399800;	-webkit-box-shadow: 0 0 18px #399800;	-moz-box-shadow: 0 0 18px #399800;	-o-box-shadow: 0 0 18px #399800;	-ms-box-shadow: 0 0 18px #399800;}</style><script>function passwordStrength(password){	var desc = new Array();		desc[0] = "Too Short";	desc[1] = "Weak";	desc[2] = "Terrible";	desc[3] = "Better";	desc[4] = "Good";	desc[5] = "Strong";	desc[6] = "Secure";	desc[7] = "Legendary";	var score   = 0;		if (password.length > 8) score++;	if (password.match(/\d+/)) score++;	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  score++;	if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  score++;	if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) score++;	if (password.length > 13) score++;	if (password.length > 20 && password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) score++;			document.getElementById("passwordDescription").innerHTML = desc[score];	document.getElementById("passwordStrength").className = "strength" + score;}</script>
</head>
<body id="login-bg">
<div id="login-holder">
	<div id="logo-login">
	</div>
	<div class="clear">
	</div>
	<div id="loginbox">
		<center>
		</center>
		<div id="login-inner"><?php		if ($message != "")			{			echo $message;			}		if (isset($errors))			{			errorBlock($errors);			} ?>			<form method="POST" action="" id="register">
				<table border="0" cellpadding="0" cellspacing="0">								<tr>					<th>						Email					</th>					<td>						<input type="text" name="email" placeholder="someone@somesite.com" class="login-inp"/>					</td>				</tr>
				<tr>
					<th>
						Username
					</th>
					<td>
						<input name="username" type="text" class="login-inp" placeholder="ex: TraderBob"/>
					</td>
				</tr>
				<tr>
					<th>
						Password
					</th>
					<td>
						<input type="password" id="password1" name="password" class="login-inp" placeholder="Password" onkeyup="passwordStrength(this.value)"/>
					</td>
				</tr>				</br>				</br>				<tr>									<th>											Strength										</th>					<td>												<p>							<div id="passwordDescription">Password not entered</div>							<div id="strength">								<div id="passwordStrength" class="strength0"></div>							</div>						</p>											</td>				</tr>								<tr>					<th>						Password					</th>					<td>						<input type="password" id="password2" name="passwordc" class="login-inp" placeholder="Repeat/Confirm"/>					</td>				</tr>				
				<tr>
					<th>
					</th>
					<td>
						<input type="submit" class="submit-login"/>
					</td>
				</tr>
				</table>
			</form>
		</div>
		<div class="clear">			 
		</div>
	</div>
</div>
</body>
</html>