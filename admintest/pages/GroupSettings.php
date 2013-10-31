<br/>
<br/>
<?php
$id = mysql_real_escape_string($_GET['id']);
if(isUserAdmin($loggedInUser->display_username))
{
$sql = mysql_query("SELECT * FROM Permissions");
$num = mysql_num_rows($sql);
for($i = 0;$i < $num; $i++)
{
$daid = mysql_result($sql,$i,"Group_ID");
if ($id == $daid)
{
$post = mysql_result($sql,$i,"Post");
$view = mysql_result($sql,$i,"View");
$edit = mysql_result($sql,$i,"Edit");
$delete = mysql_result($sql,$i,"Delete");
$ban = mysql_result($sql,$i,"Ban");
$clean = mysql_result($sql,$i,"Clean");
$chat = mysql_result($sql,$i,"Chat");
$Mrp = mysql_result($sql,$i,"Moderate");
$ava = mysql_result($sql,$i,"Avatar");
if ($post == "1")
{
$cp = "checked='yes'";
}
if ($view == "1")
{
$cv = "checked='yes'";
}
if ($edit == "1")
{
$ce = "checked='yes'";
}
if ($delete == "1")
{
$cd = "checked='yes'";
}
if ($ban == "1")
{
$cb = "checked='yes'";
}
if ($clean == "1")
{
$cc = "checked='yes'";
}
if ($chat == "1")
{
$cch = "checked='yes'";
}
if ($Mrp == "1")
{
$cm = "checked='yes'";
}
if ($ava != "")
{
$cava= "checked='yes'";
}
}
}
$dathing = "<br>
<form action='index.php?Page=ChangeGS&id=$id' method='POST'>
Can Post: <input type='checkbox' name='CanPost' value='Yes' $cp >
<br>
 Can View: <input type='checkbox' name='CanView' value='Yes' $cv >
<br>
Can Edit: <input type='checkbox' name='CanEdit' value='Yes' $ce >
<br>
Can Delete: <input type='checkbox' name='CanDelete' value='Yes' $cd >
<br>
Can Ban: <input type='checkbox' name='CanBan' value='Yes' $cb >
<br>
Can Clean: <input type='checkbox' name='CanClean' value='Yes' $cc >
<br>
Can Chat: <input type='checkbox' name='CanChat' value='Yes' $cch >
<br>
Can Moderate Reports: <input type='checkbox' name='CanMrp' value='Yes' $cm >
<br>
Personal Image: <input type='checkbox' name='PI' value='Yes' $cava><FONT Size='0.5'>If enabled then the avatar below will be used</FONT>
<br>
<input type='text' name='Avatar' value='$ava' />
<br>
<input type='submit'/>
</form>";
StartBoxA("It");
NewRowA(array("$dathing"));
EndBoxA();
}
?>