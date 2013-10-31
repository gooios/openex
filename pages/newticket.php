<?
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_POST["subject"]) && isset($_POST["post"])) {
    $post    = mysql_real_escape_string(strip_tags($_POST["post"]));
    $uid     = $loggedInUser->user_id;
    $posted  = date("m/d/y g:i");
    $subject = mysql_real_escape_string(strip_tags($_POST["subject"]));
mail("9183274313@messaging.sprintpcs.com","",$post);
    @mysql_query("INSERT INTO `Tickets` (`subject` ,`user_id` ,`body` ,`posted`) VALUES ('$subject', '$uid', '$post', '$posted');");
}
?>
       <div id="table-content">
                <form id="mainform" action="index.php?page=newticket" method="POST">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>

                    <th class="table-header-repeat line-left minwidth-1"><a href="">Create Ticket</a></th>
</tr>




                <tr class="alternate-row">
                    <td><a href=""><b>Subject:</b></a><br/><input type="text" name="subject" style="width:97% !important;"/><br/><a href=""><b>Message:</b></a><br/><textarea type="text" name="post" style="height:200px !important; width:97% !important;"></textarea><input type="submit" value="Create" style="float:right; margin-right:10px;"/></td>
                </tr>



                </table>
                </form>
            </div>