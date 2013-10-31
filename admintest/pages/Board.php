<?php
if(isUserAdmin($loggedInUser->display_username))
{
$sq = mysql_query("SELECT * FROM Topic");
$nu = mysql_num_rows($sq);
$sqo = mysql_query("SELECT * FROM Replies");
$nuu = mysql_num_rows($sqo);
$sqt = mysql_query("SELECT * FROM Users");
$nut = mysql_num_rows($sqt);
$sqtc = mysql_query("SELECT * FROM UserComment");
$nutc = mysql_num_rows($sqtc);
$sqto = mysql_query("SELECT *  FROM `Users` WHERE `Online` = 1");
$nuto = mysql_num_rows($sqto);
$sqtm = mysql_query("SELECT *  FROM `Users` WHERE `Mute` = 1");
$nutm = mysql_num_rows($sqtm);
$sqtmn = mysql_query("SELECT *  FROM `Reported`");
$nutmn = mysql_num_rows($sqtmn);
StartBoxA("Board");
NewRow(array("Statistics","Value","Statistics","Value"));
NewRow(array("Total Topics:",$nu,"Total Replies:",$nuu));
NewRow(array("Total Posts:",$nuu + $nu,"Total Users:",$nut));
NewRow(array("Total Profile Comments:", $nutc,"Total Users Online:", $nuto));
NewRow(array("Total Users Muted:", $nutm,"Total Topics Reported:", $nutmn));
EndBoxA();
?>
<hr>
<center>Admin Actions</center>
<br/>
<?php
StartBoxA("");
NewRow(array("Username","IP","Time","Action"));
$sqaa = mysql_query("SELECT * FROM Logged ORDER BY ID");
$nuaa = mysql_num_rows($sqaa);
for($i = 0; $i < $nuaa; $i++)
{
$Name = mysql_result($sqaa,$i,"Username");
$Time = mysql_result($sqaa,$i,"Time");
$IP = mysql_result($sqaa,$i,"IP");
$Action = mysql_result($sqaa,$i,"Action");
NewRow(array($Name,$IP,$Time,$Action));
}
EndBoxA();
}
?>