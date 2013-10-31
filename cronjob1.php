<?php
error_reporting(-1);
include("models/config.php");
include("models/class.trade.php");

$sell = mysql_query("SELECT * FROM trades WHERE `To`<>'BTC'");

$num = mysql_num_rows($sell);

for ($i = 0; $i < $num; $i++) {
   $id = mysql_result($sell,$i,"Id");
   if($id != 0)
   {
		$trade = new Trade($id);
		$trade->GetEquivalentTrade();
		$trade->ExecuteTrade();
   }
}

?>