 <?
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$id    = @mysql_real_escape_string($_GET["id"]);
$sql   = @mysql_query("SELECT * FROM Tickets WHERE `id`=$id");
$owner = @mysql_result($sql, 0, "user_id");$admin = 7;
if ($loggedInUser->user_id == $owner OR isUserAdmin($id)) {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "closev") {
            echo "Are you sure? <a href=\"index.php?page=viewticket&action=closey&id=" . $id . "\"><input type=\"submit\" value=\"Yes\"/></a><a href=\"index.php?page=viewticket&id=$id\"><input type=\"submit\" value=\"No\"/></a>";
        }
        if ($_GET["action"] == "closey") {
            mysql_query("UPDATE Tickets SET opened=0 WHERE `id`='$id'");
            echo "Your ticket has been closed.";
        }
if ($_GET["action"] == "open")
{
            mysql_query("UPDATE Tickets SET opened=1 WHERE `id`='$id'");
            echo "Your ticket has been reopened.";
}
    } else {
        $subject = mysql_result($sql, 0, "subject");
        if (isset($_POST["post"])) {
            $post   = mysql_real_escape_string(strip_tags($_POST["post"]));
            $uid    = $loggedInUser->user_id;
            $posted = date("d/m/y g:i");
            @mysql_query("INSERT INTO `TicketReplies` (`ticket_id` ,`user_id` ,`body` ,`posted`) VALUES ('$id', '$uid', '$post', '$posted');");
        }
        $subject = mysql_result($sql, 0, "subject");
        $post    = mysql_result($sql, 0, "body");
        $posted  = mysql_result($sql, 0, "posted");
        $opened  = mysql_result($sql, 0, "opened");
?>
<div style="background:url(images/button.png); width:100px; height:35px;">
<center>
<h3>
<?php
        if ($opened == 0) {
?>
<a href="index.php?page=viewticket&id=<?
            echo $id;
?>&action=open" style="display:block; padding-top:7px; padding-bottom:7px; color:#FFF;">Open</a>
<?
        } else {
?>
<a href="index.php?page=viewticket&id=<?
            echo $id;
?>&action=closev" style="display:block; padding-top:7px; padding-bottom:7px; color:#FFF;">Close</a>
<?
        }
?>
</h3>
</center>
</div><br/><br/>
        <div id="table-content">
                <form id="mainform" action="">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>

                    <th class="table-header-repeat line-left minwidth-1"><a href=""><?
        echo $subject;
?> @ <?
        echo $posted;
?></a></th>
</tr>




                <tr class="alternate-row">
                    <td><u><b>Posted By:</b><i><?
        echo GetUser($owner);
?></i></u> @ <?
        echo $posted;
?><br/><?
        echo nl2br($post);
?></td>
                </tr>



                </table>
                </form>
            </div>
<?
        
        
        $replies = @mysql_query("SELECT * FROM TicketReplies WHERE `ticket_id`='$id' ORDER BY `id` ASC");
        $num2    = @mysql_num_rows($replies);
        for ($i = 0; $i < $num2; $i++) {
            $post   = mysql_result($replies, $i, "body");
            $owner  = mysql_result($replies, $i, "user_id");
            $posted = mysql_result($replies, $i, "posted");
?>

        <div id="table-content">
                <form id="mainform" action="">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>

                    <th class="table-header-repeat line-left minwidth-1"><a href=""><?
            echo $subject;
?> @ <?
            echo $posted;
?></a></th>
</tr>




                <tr class="alternate-row">
                    <td><u><b>Posted By:</b><i><?
            echo GetUser($owner);
?></i></u> @ <?
            echo $posted;
?><br/><?
            echo nl2br($post);
?></td>
                </tr>



                </table>
                </form>
            </div>
<?
        }
?>
<center>
        <div id="table-content">
                <div id="mainform">
                <table border="0" width="60%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>

                    <th class="table-header-repeat line-left minwidth-1"><a href="">Reply</a></th>
</tr>




                <tr class="alternate-row">
                    <td><form action="index.php?page=viewticket&id=<?
        echo $id;
?>" method="POST">
<textarea name="post" id="post" style="width:97% !important; height:200px !important; "></textarea><br/>
<input type="submit"/>
</form></td>
                </tr>



                </table>
                </div>
            </div>
</center>
<?
    }
} else {
    echo "This is not a valid ticket.";
}
?> 