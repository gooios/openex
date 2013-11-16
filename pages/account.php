<link href="assets/css/tables.css" type="text/css" rel="stylesheet" />
<center><h3><? $account = $loggedInUser->display_username; echo "Welcome to your account page <b>".$account.""; ?></h3><div id="page">
<table id="page">
<tr>
	<th>Currency</th><th>Available</th><th>Pending</th><th>Deposit</th><th>Withdraw</th>
</tr><b
<?php
if(!isUserLoggedIn()){ header("LOCATION:index.php?page=login"); die(); }
$user_id =  $loggedInUser->user_id;
$sql = mysql_query("SELECT * FROM currencies");
while ($row = mysql_fetch_assoc($sql)) {
$coin = $row["Acronymn"];
$result = mysql_query("SELECT * FROM balances WHERE User_ID='$user_id' AND Coin = '$coin'");
if($result == NULL)
{
$amount = 0;
$pending = 0;
}
else
{
$amount = mysql_result($result,0,"Amount");$account = $loggedInUser->display_username;$sqls = mysql_query("SELECT * FROM deposits WHERE `Paid`='0' AND `Account`='$account' AND `Coin`='$coin'");
$nums = mysql_num_rows($sqls);$pending = 0;$sqls2 = mysql_query("SELECT * FROM markets WHERE `Acronymn`='".$row["Acronymn"] . "'");$market_id = mysql_result($sqls2,0,"id");for($iz = 0;$i<$nums; $i++){$pending = $pending + mysql_result($sqls,$iz,"Amount");}
}
?>
<tr>
	<td><a style="color:#000;" href="index.php?page=trade&market=<?php echo $market_id; ?>"><?php echo $row["Acronymn"];?></a></td><td><?php echo $amount ?></td><td><?php echo $pending; ?></td><td><a style="color:#000;" href="index.php?page=deposit&id=<?php echo $row["id"]; ?>">Deposit</a></td><td><a style="color:#000;" href="index.php?page=withdraw&id=<?php echo $row["id"]; ?>">Withdraw</a></td>
</tr>
<?php
}
?>
</table></div>
</center>

