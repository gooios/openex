<br/>
<br/>
<?php
if (isUserAdmin($loggedInUser->display_username)) {
    $sql = mysql_query("SELECT * FROM Chat");
    $num = mysql_num_rows($sql);
    StartBoxA("Chats");
    NewRowA(array("Message","ID","Posted by","Delete"));
    for ($i = 0; $i < $num; $i++) {
        $mess   = mysql_result($sql, $i, "Message");
        $posted = mysql_result($sql, $i, "Posted");
        $id     = mysql_result($sql, $i, "id");
        NewRowA(array(
            $mess,
            $id,
            $posted,
            "<a href=\"index.php?Page=DeleteChat&id=$id\">Delete</a>"
        ));
    }
        EndBoxA();
}
?>
<br/>
<?php
if (isUserAdmin($loggedInUser->display_username)) {
    StartBoxA("Chats");
    NewRowA(array(
        "<a href='index.php?Page=Clear'>Clear</a>"
    ));
    EndBoxA();
}
?>
<br/>
<?php
if (isUserAdmin($loggedInUser->display_username)) {
    StartBoxA("Chat through server");
    NewRowA(array(
        "Chat Through Server<br><br><form action='index.php?Page=NewChat' method='POST'>
Message: <textarea name='message'></textarea><br/> <input type='submit'/></form>Mute Player<br><br><form action='index.php?Page=Mute' method='POST'>
Player: <textarea name='User'></textarea><br/> <input type='submit'/></form><br><br>
Un-mute<br>"
    ));
    EndBoxA();
}
?>
<?php
if (isUserAdmin($loggedInUser->display_username)) {
    $sqlo = mysql_query("SELECT * FROM Users");
    $numo = mysql_num_rows($sqlo);
    for ($i = 0; $i < $numo; $i++) {
        $name = mysql_result($sqlo, $i, "Username");
        $mute = mysql_result($sqlo, $i, "Mute");
        if ($mute == 1) {
            $messag = "<a href='index.php?Page=UNMute&name=$name'><FONT COLOR='Black'><center>$name</Center></FONT>";
            NewRow(array(
                $messag
            ));
        }
    }
}
?>