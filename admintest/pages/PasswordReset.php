<?php

if(isUserAdmin($loggedInUser->display_username))
{
if(isset($_POST["User"]))
{
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
$user = mysql_real_escape_string($_POST["User"]);
$NewPass = rand_string(14);

mysql_query("UPDATE Users SET Password = '" . generateHash($NewPass) . "' WHERE Username_Clean = '$user'");
echo $user . "'s new pass is: " . $NewPass;
}

}
?>
<?
echo '
<form action="index.php?Page=PasswordReset" method="POST">
<input type="text" name="User"/>
<input type="submit"/>
</form>';
?>