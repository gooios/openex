<?php
if(isUserAdmin($loggedInUser->display_username))
{
if($_POST["ChangeGroup"] != "")
{
$bname = mysql_real_escape_string($_POST["ChangeGroup"]);
$bnamet = mysql_real_escape_string($_GET["id"]);
$Name = $loggedInUser->display_username;
$loldan = mysql_query("SELECT * FROM Users WHERE Username = '$Name'");
$IP = mysql_result($loldan,0,"Last_Ip");
$danameofhim = getUserFromId($bnamet);
$Time = date("y/m/d @ G:i T",time());
mysql_query("INSERT INTO `Logged` (`Username` ,`Time` ,`IP` ,`Action`)VALUES ('$Name', '$Time', '$IP', 'Changed the group id of $danameofhim to $bname');
");
mysql_query("UPDATE Users SET Group_ID = '" . $_POST["ChangeGroup"] ."' WHERE User_ID = '" . mysql_real_escape_string($_GET["id"]) . "'");
}
$user_id = $_GET["id"];
$sql = mysql_query("SELECT * FROM Users WHERE User_ID ='" . mysql_real_escape_string($user_id) . "'");
$username = mysql_result($sql,0,"Username");
$cib = CheckIfBanned($username);
$avatar = mysql_result($sql,0,"Avatar");
$ip = mysql_result($sql,0,"Last_Ip");
$email = mysql_result($sql,0,"Email");
$id = mysql_result($sql,0,"User_ID");
$profile = mysql_result($sql,0,"Profile");
}
?>
<center>
<h1><?php 
if(isUserAdmin($loggedInUser->display_username))
{
echo $username; 
}
?></h1>
<img src="<? echo $avatar; ?>" alt="<? echo $username; ?>" height=220 width=220/>
<?php
if(isUserAdmin($loggedInUser->display_username))
{
StartBoxA("User Information");
NewRowA(array($username,$email,$avatar,$profile,$ip));
EndBoxA();
}
?>
<a style="color:#000;" href="Index.php?Page=BanUser&id=<?php echo $_GET["id"]; ?>&name=<?php echo $ip; ?>">Ban User</a><br/>
<a style="color:#000;" href="Index.php?Page=DeleteUser&id=<?php echo $_GET["id"]; ?>"> Delete User</a>
<form action="Index.php?Page=EditUser&id=<?php echo $_GET["id"]; ?>" method="POST">
Change Group: <select name="ChangeGroup">
<?php
if(isUserAdmin($loggedInUser->display_username))
{
$sql2 = mysql_query("SELECT * FROM Groups");
$num = mysql_num_rows($sql2);
for($i = 0; $i < $num; $i++)
{
$name = mysql_result($sql2,$i,"Group_Name");
$id = mysql_result($sql2,$i,"Group_ID");
if ($id != "2"){
echo "<option value='" . $id . "'>" . $name . "</option>";
}
}
}
?>
</select>
<br/>
<input type="submit" value="Update"/>
</form>
</center>