<style>
#conash3D0
{
display:none;
}</style>
<? include("../models/config.php"); ?>
<div align=center>
<table width="100%" height="10px" cellpadding="1" cellspacing="0" border="1" style="background-color:#F0f0f0;">
<tr style="background:url('../ForumImages/Forum_Head.png') !important; color:#FFF !important;">
<td align="left" style="width:45%;">Username</td>
<td align="left" >Joined</td>
<td align="left" >Rank</td>
<td align="left" >Email</td>


</tr>
<?php


$sql = mysql_query("SELECT * FROM Users
ORDER BY Username");
$num=mysql_num_rows($sql); 
for ($i=0;$i<$num;$i++)
{
$id = mysql_result($sql,$i,"User_ID");
$joined = date("m/d/y",mysql_result($sql,$i,"SignUpDate"));
$user = mysql_result($sql,$i,"Username");
$email = mysql_result($sql,$i,"email");

$rank = mysql_result($sql,$i,"Group_id");
?>
<tr style="color:#000 !important;">
<td align="left" ><a href='Main.php?page=profile&id=<? echo $id; ?>'><? echo $user; ?></a></td>
<td align="left" ><? echo $joined; ?></td>
<td align="left" ><? echo $rank; ?></td>
<td align="left" ><? echo $email; ?></td>

</tr>
<?
}
?>
</table>
</div>
