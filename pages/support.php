<link href="assets/css/tables.css" type="text/css" rel="stylesheet" />
<?php

$id = $loggedInUser->user_id;
$account = $loggedInUser->display_username;
if(!isUserLoggedIn()){
header('Location: http://openex.pw/access_denied.php');
}
if(isUserAdmin($id) === true)
{
echo "Welcome Admin</br></br></br>";
echo "admin options go here</br>";
$sql = mysql_query("SELECT * FROM Tickets");
}
else
{
echo "How may I help you today, <b>".$account."</b> ?</br></br></br>";
echo "
<ul id='page-nav'>
	<li><a href='index.php?page=newticket'>Get Support</a></li>
</ul>
</br>";
$sql = mysql_query("SELECT * FROM Tickets WHERE `user_id`='$id'");
}

$num = mysql_num_rows($sql);
?>

			<div id="page">
				<form action="">
				<table id="page">
				<tr>
					<th><a id="toggle-all" ></a> </th>
					<th><a href="">Ticket Subject</a>	</th>
					<th><a href="">Posted</a></th>			
					<th><a href="">Answers</a></th>
					<th><a href="">Status</a>
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
				<tr>
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