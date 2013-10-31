<?php
$user = mysql_real_escape_string($_POST["UserMin"]);
mysql_query("UPDATE Reg SET UserMin = '$user'");
?>