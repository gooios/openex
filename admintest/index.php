<?php
require_once("models/config.php");
error_reporting(1);
//if(true)
//{
?>
<link rel="stylesheet" type="text/css" media="all" href="style.css">
<html>
<head>
<title>
LuaCore ACP
</title>
</head>
<body>
<center>
<?php
StartBoxA("",false,true);
NewRowA(array("<h1>Luacore Admin Control Panel<h1>"),array("width:100% !important;"));

NewRowA(array('
<a href="index.php?Page=Board">Board |</a>
<a href="index.php?Page=Groups">Group Settings |</a>
<a href="index.php?Page=Users">Users |</a>
<a href="index.php?Page=Threads">Threads |</a>
<a href="index.php?Page=Posts">Post Settings |</a>
<a href="index.php?Page=PasswordReset">Password Reset |</a>
<a href="index.php?Page=Chat">Chat settings |</a>
<a href="index.php?Page=News">News |</a>
<a href="index.php?Page=Help">Help</a>'),array("width:100% !important;"));
EndBoxA();
?>
</center>
<br/>

<?
if($_GET["Page"] != "")
{
@include("pages/". mysql_real_escape_string($_GET['Page']) . ".php");
}else{
@include("pages/Redirect.php");
}
?>

</body>
</html>
<?php
//}
?>