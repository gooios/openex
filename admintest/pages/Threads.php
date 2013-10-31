<br/>
<br/>
<?php
$sql = mysql_query("SELECT * FROM Thread");
$num = mysql_num_rows($sql);
StartBoxA("Threads");
NewRowA(array("Name","Description","id","category","Delete"));
for($i = 0;$i < $num; $i++)
{
$Thread = mysql_result($sql,$i,"Name");
$desc = mysql_result($sql,$i,"Description");
$category = mysql_result($sql,$i,"Category");
$id = mysql_result($sql,$i,"Id");
NewRowA(array($Thread,$desc,$id,$category,"<a href=\"index.php?Page=DeleteThread&id=$id\">Delete</a>"));

}
EndBoxA();
?>
<br/>
<br/>
<?php
StartBoxA("New Thread");
NewRowA(array("<form action='index.php?Page=NewThread' method='POST'>Thread Category: <input type='text' name='cat'/> <br/>Thread Name: <input type='text' name='tname'/> <br/>
Description: <textarea name='desc'></textarea><br/>
Password: <input type='password' name='pass'/><FONT Size='1'>Leave blank if not wanted</FONT> <br/> <input type='submit'/>"));
EndBoxA();

?>