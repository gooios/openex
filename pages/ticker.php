
<font color="green"><?php /* ANC */ get_tickers($id = '15'); echo $last_trade; ?></font>
<font color="green"><?php /* CGB */ get_tickers($id = '10'); echo $last_trade; ?></font>
<font color="green"><?php /* CPR */ get_tickers($id = '6'); echo $last_trade; ?></font>
<font color="green"><?php /* FRK */ get_tickers($id = '7'); echo $last_trade; ?></font>
<font color="green"><?php /* GLD */ get_tickers($id = '9'); echo $last_trade; ?></font>
<font color="green"><?php /* LTC */ get_tickers($id = '2'); echo $last_trade; ?></font>
<font color="green"><?php /* MEC */ get_tickers($id = '8'); echo $last_trade; ?></font>
<font color="green"><?php /* NVC */ get_tickers($id = '4'); echo $last_trade; ?></font>
<font color="green"><?php /* OSC */ get_tickers($id = '3'); echo $last_trade; ?></font>
<font color="green"><?php /* UNO */ get_tickers($id = '5'); echo $last_trade; ?></font>
<font color="green"><?php /* XPM */ get_tickers($id = '11'); echo $last_trade; ?></font>
<?php

function get_tickers($id)
{
$result = mysql_query("SELECT * FROM markets WHERE `id`='$id'");
$last_trade = mysql_real_escape_string(mysql_result($result, 0, "Last_Trade"));
}
?>