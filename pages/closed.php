<?php
$testnamepair1 ="<h6>test123 | 12345678</h6>";
$testnamepair2 ="<h6>test2 | password</h6>";
$testnamepair3 ="<h6>test5 | password</h6>";
$testnamepair4 ="<h6>TraderBob | 12345678</h6>";

echo "<b>This page is temporarily unavailable. sorry about that.</b></br>however, feel free to login with one of our test usernames and play around a bit.</br>";
echo "<h4>Test Users</h4>";
echo "<h5>format: user | pass </h5>";
echo $testnamepair1;
echo $testnamepair4;
echo $testnamepair2;
echo $testnamepair3;

//this will have to do for now. doesn't work if browser has js disabled.
end;
//screw it js is easier

/*

//http://php.net/manual/en/function.get-browser.php

$jsenabled = get_browser(null, true)=>javascript == 1

if ($jsenabled != null;) {
echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
}
else { 
echo "click the back button to return to the previous page.";
}*/
?>