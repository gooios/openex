<br/>
<br/>
<?php
if(isUserAdmin($loggedInUser->display_username))
{
$sql = mysql_query("SELECT * FROM Blog");
$num = mysql_num_rows($sql);
StartBoxA("");
NewRowA(array("Image","Text","Delete"));
for($i = 0;$i < $num; $i++)
{
$name = mysql_result($sql,$i,"Name");
$iname = mysql_result($sql,$i,"IName");
$image = mysql_result($sql,$i,"Image");
$text = mysql_result($sql,$i,"Text");
$poster = mysql_result($sql,$i,"Poster");
$time = date('h:i:s',time());
NewRowA(array("$iname","$name","<a href=\"index.php?Page=DeleteBlog&Name=$name\">Delete</a>"));
NewRowA(array('<img src="' . $image . '" alt="" width=200 height=200></img>',"$text",""));
NewRowA(array("Posted by $poster","Posted at $time",""));
}
EndBoxA();
}
?>
<br/>
<?php
if(isUserAdmin($loggedInUser->display_username))
{
StartBoxA("Blog");
NewRowA(array("Blog<br><br><form action='index.php?Page=NewBlog' method='POST'>
Text: <textarea name='text'></textarea><br/>Name: <textarea name='name'></textarea><br/>Image: <textarea name='image'></textarea><br/>Image Name: <textarea name='iname'></textarea><br/> <input type='submit'/>"));
EndBoxA();
}
?>