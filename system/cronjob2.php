<?php

include("models/config.php");

error_reporting(E_ALL);




function AddMoneys($amount, $user, $currency)

{

    $sq    = mysql_query("SELECT * FROM userCake_Users WHERE `Username_Clean`='$user'");

    $user2 = mysql_result($sq, 0, "User_ID");

    $sql   = mysql_query("SELECT * FROM balances WHERE `User_ID`='$user2' AND `Coin`='$currency'");

    $id    = mysql_result($sql, 0, "id");

    if ($id < 1) {

        mysql_query("INSERT INTO  balances (`User_ID`,`Amount`,`Coin`,`Pending`) VALUES ('$user2','$amount','$currency','0');");

    } else {

        $old = mysql_result($sql, 0, "Amount");

        $new = $old + $amount;

        mysql_query("UPDATE balances SET `Amount` = $new WHERE `User_ID` = '$user2' AND `Coin` = '$currency';");

    }

}





$sql = mysql_query("SELECT * FROM currencies");

$num = mysql_num_rows($sql);

for ($i = 0; $i < $num; $i++) {
    $ip      = mysql_result($sql, $i, "ip");
    $port    = mysql_result($sql, $i, "port");
    $coin    = mysql_result($sql, $i, "Acronymn");
    $bitcoin = @establishRPCConnection($ip, $port);
    $dec = @$bitcoin->listtransactions();
	echo "LOL";
if($dec != null)
{
	@print_r($dec);
    foreach ($dec as $row) {
        $tx     = $row["txid"];
        $amount = $row["amount"];
        if ($row["account"] != "") {
            $sqls = mysql_query("SELECT * FROM deposits WHERE `Transaction_Id`='$tx' AND `Coin`='$coin'");
            $id      = mysql_result($sqls, 0, "id");

            $account = $row["account"];

            if ($id < 1) {

                mysql_query("INSERT INTO  deposits (`Transaction_Id`,`Amount`,`Coin`,`Paid`,`Account`) VALUES ('$tx','$amount','$coin','0','$account');");

            } else {

                $paid = mysql_result($sqls, 0, "Paid");

                if ($row["confirmations"] >= 3 && $paid == 0) {

                    AddMoneys($amount, $row["account"], $coin);

                    mysql_query("UPDATE deposits SET `Paid`='1' WHERE `Transaction_Id`='$tx'");

                }
            }
        }
    }
	}
}


/*
if ($_GET["MANUAL"] == "true") {

    $sql = mysql_query("SELECT * FROM currencies");

    $num = mysql_num_rows($sql);

    for ($i = 0; $i < $num; $i++) {

        $ip   = mysql_result($sql, $i, "ip");

        $port = mysql_result($sql, $i, "port");

        $coin = mysql_result($sql, $i, "Acronymn");

        $sqls = mysql_query("SELECT * FROM deposits WHERE `Paid`='0' AND `Coin`='$coin'");

        $numz = mysql_num_rows($sqls);

        for ($iz = 0; $iz < $numz; $iz++) {

            $tx      = mysql_result($sqls, $iz, "Transaction_Id");

            $amount  = mysql_result($sqls, $iz, "Amount");

            $bitcoin = establishRPCConnection($ip, $port);

            

            $dec = $bitcoin->gettransaction($tx);

            

            foreach ($dec as $row) {

                foreach ($row as $detail) {

                    $account = $detail["account"];

                    

                }

            }

             AddMoneys($amount, $account, $coin);

             mysql_query("UPDATE deposits SET `Paid`='1' WHERE `Transaction_Id`='$tx'");

             mysql_query("UPDATE deposits SET `Account`='$account' WHERE `Transaction_Id`='$tx'");

            echo "<br/>Am: $amount AC: $account C: $coin<br/>";

            

        }

    }
	*/

    

    

//}







?>