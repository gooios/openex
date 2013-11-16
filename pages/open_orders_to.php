<?php

include("../models/config.php");


$id     = mysql_real_escape_string($_GET["market"]);

$result = mysql_query("SELECT * FROM markets WHERE id=$id");

$name   = mysql_real_escape_string(mysql_result($result, 0, "Acronymn"));

$type = $name;

?>

<div class="top">

<center>

<font color="FFFFFF">

Buy Orders

</font>

</center>

</div>

<div class="box">

<table style="border: 1px solid black;border-bottom-left-radius:4px;border-bottom-right-radius:4px;" class="data">

<thead>

<tr>

    <th style="border-right:1px solid black; border-bottom:2px solid black;"id="th2">Price (BTC)</th>

    <th style="border-right:1px solid black; border-bottom:2px solid black;"  id="th3"><?php echo $name;?></th>

	<th style=" border-left:1px solid black;border-bottom:2px solid black;" id="th4">Total (BTC)</th>

</tr>



<?php





$sql = mysql_query("SELECT * FROM trades WHERE `Type`='$type' ORDER BY Value DESC");



while ($row = mysql_fetch_assoc($sql)) {

if($row["To"] == $name) { 
if($name == "ONC")
{
$divider = 1000;
}
?>



<tr>

	<th  style="border-right:1px solid black; "><?php if($divider != 0) {echo sprintf('%.9f',$row["Value"]/$divider);} else {echo sprintf('%.9f',$row["Value"]);}?></th>

    <th style="border-right:1px solid black; "><?php echo $row["Amount"];?></th>

	<th style="border-left:1px solid black; " ><?php if($divider != 0) { echo sprintf('%.9f',$row["Amount"] * $row["Value"] / 1000); } else { echo sprintf('%.9f',$row["Amount"] * $row["Value"]); }?></th>



</tr>



<?php

}

}

?>
</thead>

</table>

</div>
