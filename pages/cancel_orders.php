<?php

include("../models/config.php");

?>

<link rel="stylesheet" href="style.css" media="screen">

<style>

.top

{

background: #3a4043;

border-top-left-radius: 4px;

border-top-right-radius: 4px;

text-transform: uppercase;

font-weight: bold;

padding: 5;

width: 100%;

}

.box

{

background:#FFFFFF;

padding:0;

height:168px;

border-bottom-left-radius: 4px;

border-bottom-right-radius: 4px;

border: 1px solid black;

width:100%;

}

</style>

<center>

<?

$id     = mysql_real_escape_string($_GET["market"]);

$result = mysql_query("SELECT * FROM markets WHERE `id`=$id");

$name   = mysql_real_escape_string(mysql_result($result, 0, "Acronymn"));

$type = $name;
$user = $loggedInUser->user_id;

?>

<div class="top">

<center>

<font color="FFFFFF">

Your Orders

</font>

</center>

</div>

<div class="box" style="overflow-y:scroll;">

<table id="tablestructure" style="border: 1px solid black;border-bottom-left-radius:4px;border-bottom-right-radius:4px;" class="data">

<thead>

<tr>

    <th style="border-right:1px solid black; border-bottom:2px solid black;"id="th2">Price (BTC)</th>

    <th style="border-right:1px solid black; border-bottom:2px solid black;"  id="th3"><?php echo $name;?></th>

	<th style=" border-left:1px solid black;border-bottom:2px solid black;" id="th4">Total (BTC)</th>
<th style=" border-left:1px solid black;border-bottom:2px solid black;" id="th4">Cancel</th>
</tr>



<?php





$sql = mysql_query("SELECT * FROM trades WHERE `Type`='$type' AND `User_ID`='$user' ORDER BY `Value` ASC");



while ($row = mysql_fetch_assoc($sql)) {



?>



<tr>

	<th  style="border-right:1px solid black; "id="th3"><?php echo sprintf('%.9f',$row["Value"]);?></th>

    <th id="th2"><?php echo $row["Amount"];?></th>
<?php 
$marketid = $_GET["market"];
$ids = $row["Id"];
?>
	<th style="border-left:1px solid black; " id="th4"><?php echo sprintf('%.9f',$row["Amount"] * $row["Value"]);?></th>
	<th style=" border-left:1px solid black;" id="th4"><a href="index.php?page=trade&market=<?php echo $marketid; ?>&cancel=<?php echo $ids; ?>">Cancel</a></th>


</tr>



<?php


}

?>





</thead>

</table>

</div>

</center>