<?php
if(isUserLoggedIn())
{
?>
<?php
    $page = mysql_real_escape_string($_GET["p"]);
$start = 0;
$end = 20;
if($page != 0)
{
$start = 0 + ($page * 20);
$end = 20 + ($page * 20);
}
function remove_numeric($string) {
return preg_replace ('/[^\d\s]/', '', $string);
}
    $id2   = mysql_real_escape_string(remove_numeric($_GET["id"]));
    $sql   = mysql_query("SELECT * FROM Topic WHERE ID = '$id2' ORDER BY LastPost DESC ");
    $num   = mysql_num_rows($sql);
?>
<center>
<?

    if ($id2 != "6") {
        $newthread = "<a style=\"color:#000;\" onclick=\"InsertPage('NewTopic.php','" . $id2 . "'); remove(this.parentNode.parentNode.parentNode.parentNode.parentNode);\">Start New Topic</a>";
    } else {
        $newthread = "<a onclick=\"InsertPage('NewTutorial.php','" . $id2 . "'); remove(this.parentNode.parentNode.parentNode.parentNode.parentNode);\">Upload new tutorial</a>";
    }
?>
</center>
<div style="width:799px;">
<a style="float:left;" href="Main.php?Page=NewTopic&id=<? echo $id2; ?>"><img src="skin/images/newtopic.gif" alt="New Topic"/></a>
<br/>
<?

    StartBox("Forums",true);
NewRow(array("Thread","Started By","Replies","Last Post"),array("color:#fff; background:#6E99C9;","color:#fff; background:#6E99C9;","color:#fff; background:#6E99C9;","color:#fff; background:#6E99C9;"));    
    
    
    for ($i = 0; $i < 20; $i++) {
        $Name        = mysql_result($sql, $i + $start, "Subject");
        $Description = mysql_result($sql, $i + $start, "Poster");
        $id          = mysql_result($sql, $i + $start, "id");
        $sql2        = mysql_query("SELECT * FROM Replies WHERE Topic_ID = '$id'");
        $nums        = mysql_num_rows($sql2);
        $posted      = mysql_result($sql, $i + $start, "Time");
        $lastposted  = GetLastPoster($id);
        NewRow(array(
            "<a style=\" font-weight: bold; color:rgb(9, 95, 181);\" href='Main.php?Page=ViewTopic&id=" . $id . "&tid=" . $id2 . "'>" . $Name . "</a>",
            $Description,
            $nums,
            $lastposted
        ), array(
            "font-weight: bold; color: rgb(9, 95, 181); background:rgb(221, 238, 255);",
            "font-weight: bold; color: rgb(9, 95, 181); background:rgb(221, 238, 255);",
            "color:#000; background:rgb(221, 238, 255);",
            "color:#000; background:rgb(221, 238, 255);"
        ));
    }
    EndBox();
}
?><br>
<?php
 if($page == 0)
 {
 }else{
  ?>
<div align="Center">
<a href="Main.php?Page=ViewThread&p=<? echo $_GET["p"] - 1; ?>&id=<? echo $_GET["id"]; ?>"><img src="http://luacore.co/LuaCore/Skin/Images/left.png"></a>
<? } ?>
<?php 
$real = $page + 1;
$dal = round($last);
echo "$real of $dal";
?>
<?php
 if($page >= $last)
 {
 }else{
  ?>
<a href="Main.php?Page=ViewThread&p=<? echo $_GET["p"] + 1; ?>&id=<? echo $_GET["id"]; ?>"><img src="http://luacore.co/LuaCore/Skin/Images/right.png"></a>
</div>
<? } ?>
</div>