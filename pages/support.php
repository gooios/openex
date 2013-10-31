<?php
$id = $loggedInUser->user_id;
if(isUserAdmin($id) == false)
{
echo "BLARGH";
$sql = mysql_query("SELECT * FROM Tickets");
}
else
{
$sql = mysql_query("SELECT * FROM Tickets WHERE `user_id`='$id'");
}

$num = mysql_num_rows($sql);
?>
<a href="index.php?page=newticket">Start New Support Ticket</a>
			<div id="table-content">
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Ticket Subject</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Posted</a></th>			
					<th class="table-header-options line-left"><a href="">Answers</a></th>
<th class="table-header-repeat line-left minwidth-1"><a href="">Status</a>
				</tr>
<?php
for($i = 0;$i<$num;$i++)
{
$subject = mysql_result($sql,$i,"subject");
$posted = mysql_result($sql,$i,"posted");
$id = mysql_result($sql,$i,"id");
$answers = GetPosts($id);
$opened = mysql_result($sql,$i,"opened");
if($opened == 1)
{
$open = "<font color=red>Open</a>";
}
else
{
$open = "<font color=green>Closed</a>";
}
?>
				<tr class="alternate-row">
					<td><input  type="checkbox"/></td>
					<td><a href="index.php?page=viewticket&id=<?echo $id; ?>"><? echo $subject;?></a></td>
					<td><? echo $posted;?></td>
<td><? echo $answers;?></td>
<td><? echo $open; ?></td>
				</tr>
<?
}
?>

				</table>
				</form>
			</div>