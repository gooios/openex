<?php 
error_reporting(e_all);

if (isUserLoggedIn()) { ?>
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
<script type="text/javascript">
	AddLoadCallback (Calculate);
	function Calculate( ) {
	//step 1. calculate Amount * Value
	var firstvalue = GetFieldValue( "Amount" );
	var secondvalue = GetFieldValue( "Value" );
	//step two calculate fee
	var resultvalue = firstvalue * secondvalue;
	var feepercent = 1 * 0.005;
	var feeprice = resultvalue * fee percent;
	var total = feeprice + resultvalue;
	//step three update fields.
	SetFieldValue( "fee" , total );
	}
	function PageLoad() {
		AddChangeCallback( "Amount" , Calculate );
		AddChangeCallback( "Value" , Calculate );
		AddChangeCallback( "fee" , Calculate ); //total, with fee
	}
	//hmm failed
</script>
<?php

}



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

$fullname = mysql_real_escape_string(mysql_result($result, 0, "Name"));

$last_trade = mysql_real_escape_string(mysql_result($result, 0, "Last_Trade"));


if (isset($_POST["Buy"])) {

    
    
    
    
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
            echo "<p class='notify-red'>You do not have enough BTC to submit this trade</p>";
        }
    } else {
        echo "<p class='notify-red'>Must Enter Value Over 0</p>";
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
            echo "<p class='notify-red'>You do not have enough ".$name." to submit this trade</p>";
        }
    } else {
        echo "<p class='notify-red'>Must Enter Value Over 0</p>";
    }
    
}

?>
<link rel="stylesheet" type="text/css" href="../assets/css/trade.css" />
<center><h3>Trade <?php echo $fullname." | Last Trade : ".$last_trade; ?></h3></center>
<div id="chart">
	<?php
//data points for each chart




?>
<script src="../assets/charts/effects.js"></script>
<script src="../assets/charts/Chart.js"></script>
<script src="../assets/charts/excanvas.js"></script>

<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">

			

		<canvas id="canvas" height="400" width="700" style="background: #333; margin: 0 auto;" ></canvas>
	<script>

		var lineChartData = {
			labels : ["1 Week","24 Hour","8 Hour","4 Hour","2 Hour","1 Hour","Last Trade"],
			datasets : [
				{
				    //Coin A
					strokeColor : "#fff",
					pointColor : "#000",
					pointStrokeColor : "#fff",
					data : [0.0003,0.00039,0.000405,0.00041,0.00056,0.00055,0.00040,]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	</script>
	</body>
</div>
<div id="boxB">
	<div id="boxA">
		<div id="col1">
			<!-- Sell Form-->
			<?php if (isUserLoggedIn()) { ?>
			<div id="sellform">
				<center><h2>Sell <?php echo $name; ?></h2></center>
				<form action="index.php?page=trade&market=<?php echo $id; ?>" method="POST"> 
				<label>Amount:</label><input type="text" style="width:100px;" name="amount" onKeyUp="Calculate(this)" id="Amount"/>
				<label>Price:</label><input type="text" style="width:100px;" name="price"  id="Value" />
				<label>Fee:</label><input type="text" style="width:100px;" id="fee"/>
				<label>Execute:</label><input type="submit" name="Sell" value="Sell"/>
				</form>
			</div>
			<?php } ?>
			<!--Sell Order Book-->
			<div id="sellorders">
			<?php
				include("open_orders_from.php");
			?>
			</div>
		</div>
		<div id="col2">
			<!--Buy Form-->
			<?php if (isUserLoggedIn()) { ?>
			<div id="buyform">
				<center><h2>Buy <?php echo $name; ?></h2></center>
				<form action="index.php?page=trade&market=<?php echo $id; ?>" method="POST">
				<label>Amount:</label><input type="text" style="width:100px;" onKeyUp="calculateFees2()" name="amount" id="amount2"/>
				<label>Price:</label><input type="text" style="width:100px;" id="price" onKeyUp="calculateFees2()" name="price"/>
				<label>Total:</label><input type="text" style="width:100px;" id="fee2"/>
				<label>Execute:</label><input type="submit" name="Buy" value="Buy"/>
				</form>
			</div>
			<?php  } ?>
			<!--Buy Order Book-->
			<div id="buyorders">
			<?php
				include("open_orders_to.php");
			?>
		</div>
		</div>
	</div>
</div>
<?php if (isUserLoggedIn()) { include("cancel_orders.php"); }  ?>

