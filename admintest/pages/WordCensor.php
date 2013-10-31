<?php
StartBoxA("Word Censoring");
NewRowA(array("<form action='index.php?Page=NewFilter' method='POST'>
Word to be replaced: <input type='text' name='Find'/><br/>Replacing Word:<input type='text' name='Replace'/><br/><input type='submit'/></form>"));
EndBoxA();
StartBox("Censored");
NewRowA(array("<b>Find</b>","<b>Replace</b>","<b>Delete</b>","<b>Edit</b>","<b>Id</b>"));
    $sql = mysql_query("SELECT * FROM Filter");
    $num = mysql_num_rows($sql);
    for ($i = 0; $i < $num; $i++) {
        $mess   = mysql_result($sql, $i, "Find");
        $posted = mysql_result($sql, $i, "Replace");
        $id     = mysql_result($sql, $i, "id");
        NewRowA(array(
            $mess,
            $posted,
            "<a href=\"index.php?Page=DeleteCensor&id=$id\">Delete</a>",
            "<a href=\"index.php?Page=EditCensor&id=$id\">Edit</a>",
            $id
        ));
    }
EndBoxA();
?>