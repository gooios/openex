<!--until i have time to rewrite this mess of a file, a simple resize will have to do-->
<style type="text/css">
#tradeboxview {
	height: 520px;
	min-height: 520px;
	max-height: 520px;
	width: auto;
	overflow-y: scroll
}
</style>
<div id="tradeboxview">
<?php
error_reporting(e_all);

function GetMoney($user, $currency)
{
    $user2 = $user;
    $sql   = @mysql_query("SELECT * FROM balances WHERE `User_ID`='$user2' AND `Coin`='$currency'");
    $id    = @mysql_result($sql, 0, "id");
    if ($id < 1) {
        $old = mysql_result($sql, 0, "Amount");
        return $old;
    } else {
        $old = mysql_result($sql, 0, "Amount");
        return $old;
    }
}
$id = mysql_real_escape_string($_GET["market"]);

$result = mysql_query("SELECT * FROM markets WHERE `id`='$id'");

$name = mysql_real_escape_string(mysql_result($result, 0, "Acronymn"));



if (isset($_POST["Buy"])) {
    //die("Trades closed please withdraw your money.");
    
    
    
    
    $PricePer = mysql_real_escape_string(strip_tags($_POST["price"]));
    $Amount = mysql_real_escape_string(strip_tags($_POST["amount"]));
	$Amount2 = $PricePer * $Amount;
    $user_id = $loggedInUser->user_id;
    $amount  = 0.0001; //($Amount * $PricePer ) * (1/200);
    
    if ((float) $Amount > (float) 0 && $PricePer > 0.00000001) {
        if (GetMoney($user_id, "BTC") >= $Amount2 + $amount) {
            $x = $Amount2 * -1;
            AddMoney($x, $user_id, "BTC");
            AddMoney($amount, 1, "BTC");
            mysql_query("INSERT INTO trades (`To`,`From`,`Amount`,`Value`,`User_ID`,`Type`)VALUES ('$name','BTC','$Amount','$PricePer','$user_id','$name');");
        } else {
            echo "You do not have enough BTC to submit this trade";
        }
    } else {
        echo "Must Enter Value Over 0";
    }
    
}
if (isset($_GET["cancel"])) {
    $ids      = mysql_real_escape_string($_GET["cancel"]);
    $tradesql = @mysql_query("SELECT * FROM trades WHERE `Id`='$ids'");
    $from     = @mysql_result($tradesql, 0, "From");
    $Amount   = @mysql_result($tradesql, 0, "Amount");
    $owner    = @mysql_result($tradesql, 0, "User_ID");
	$Value	  = @mysql_result($tradesql,0,"Value");
    if ($owner == $loggedInUser->user_id) {
        if($from == "BTC")
		{
			AddMoney($Amount*$Value,$owner,$from);
		}
		else
		{
			AddMoney($Amount, $owner, $from);
        }
		Mysql_Query("DELETE FROM trades WHERE `Id`='$ids'");
    }
}
if (isset($_POST["Sell"])) {
//die("Trades closed please withdraw your money.");
    
    $Amount = mysql_real_escape_string(strip_tags($_POST["amount"]));
    $PricePer = mysql_real_escape_string(strip_tags($_POST["price"]));
    $user_id = $loggedInUser->user_id;
    $amount  = 0.0001; 
    
    if ((float) $Amount > (float) 0 && $PricePer > 0.00000001) {
        if (GetMoney($user_id, $name) >= $Amount) {
            
            $x = $Amount;
            AddMoney("-" . $x + $amount, $user_id, $name);
            AddMoney($amount, 1, $name);
            mysql_query("INSERT INTO trades (`To`,`From`,`Amount`,`Value`,`User_ID`,`Type`)VALUES ('BTC','$name','$Amount','$PricePer','$user_id','$name');");
        } else {
            echo "You do not have enough $name to submit this trade";
        }
    } else {
        echo "Must Enter Value Over 0";
    }
    
}

?>

<style>

.Container-1

{

width:80%;

height:100%;

}

.Top-Bar

{

width:100%;

background:#333;

height:25px;

}

.Left-Box

{

float:Left;
background:#fff;
width:49%;
color:#000;
height:200px;
border:1px black solid;
text-align:left;

}

.Right-Box

{
background:#fff;
float:Right;
color:#000;
width:49%;
height:150px;
border:1px black solid;
text-align:left;

}

</style>

<center>

<div class="Container-1">

	<div class="Top-Bar">

		<h3>Buy | Sell <?php echo $name; ?> </h3>
		<font color="BLACK">
<?php
echo $name . ":" . GetMoney($loggedInUser->user_id, $name) . " BTC:" . GetMoney($loggedInUser->user_id, "BTC");
?>
		</font>

	</div>
<br/>
	<br/>

<?php
if (isUserLoggedIn()) {
    
?>

	<div class="Left-Box">

		<center>

		<h2 style="padding:0px; margin:0px;">Sell <?php
    
    echo $name;
    
?>

		</h2>

		<br/>

		</center>
<script type="text/javascript">
function per(num, percentage){
  return num*percentage/100;
}
function calculateFees1(x)
{

var y = x.value * 1 + 0.0001;
document.getElementById('fee').value = y;//Math.abs(y * (1  / 200)).toFixed(8);

}
function calculateFees2()
{
var z = document.getElementById('price').value;
var y = document.getElementById('amount2').value * z + 0.0001;

document.getElementById('fee2').value = y;//Math.abs(y * (1  / 200)).toFixed(8);

}
</script>
		<form action="index.php?page=trade&market=<?php
    echo $id;
?>" method="POST"> 

<label>Amount <?php
    echo $name;
?>:</label><input type="text" style="width:100px;" name="amount" onKeyUp="calculateFees1(this)" id="Amount"/><br/>

<label>Price Per <?php
    echo $name;
?>:</label><input type="text" style="width:100px;" name="price"  id="Value" /><br/>

<label>Total:</label><input type="text" style="width:100px;" id="fee"/><br/>
<br/><input type="submit" name="Sell" value="Sell"/>

		</form>
<br/>
<br/>
<br>	</div>

	<div class="Right-Box">

		<center>

		<h2 style="padding:0px; margin:0px;">Buy <?php
    
    echo $name;
    
?>

		</h2>

		<br/>

		</center>

		<form action="index.php?page=trade&market=<?php echo $id; ?>" method="POST">

 <label>Amount <?php
    echo $name;
?>:</label><input type="text" style="width:100px;" onKeyUp="calculateFees2()" name="amount" id="amount2"/><br/>

			<label>Price Per: <?php
    echo $name;
?></label><input type="text" style="width:100px;" id="price" onKeyUp="calculateFees2()" name="price"/><br/>

			<label>Total:</label><input type="text" style="width:100px;" id="fee2"/><br/>
			<br/><input type="submit" name="Buy" value="Buy"/>

		</form>
<br/>
<br/>
	</div>

<?php
    
}

?>
<br>
	<div class="Left-Box" style="background:none;">

		<div style="width:100%; height:100%; background:none; border:none; color:#000;" id="contentArea1">

<?php

include("open_orders_from.php");
?>
<br/>
<br/>
			</div>

		</div>

		<div class="Right-Box" style="background:none;">

<div style="width:100%; height:100%; background:none; border:none; color:#000;" id="contentArea2">

<?php

include("open_orders_to.php");

?>
<br/>
<br/>
</div>

		</div>
<div class="Right-Box" style="background:none; width:100%;">

<div style="width:100%; height:100%; background:none; border:none; color:#000;" id="contentArea2">

<?php

include("cancel_orders.php");

?>

</div>

		</div>

		</center>
</div>