<?php
if (isUserLoggedIn()) {
	$loggedInUser->userLogOut();
?>
<meta http-equiv="refresh" content="0;url=index.php?page=loggedout" />
<?php
die();
} 


if (!isUserLoggedIn()) {
	header( 'Location : access_denied.php' );
	die ();
}
?>