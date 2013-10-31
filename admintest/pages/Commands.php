<?php
if(isUserAdmin($loggedInUser->display_username))
{
StartBoxA("Commands");
NewRowA(array("<form action='index.php?Page=AcCommand' method='POST'>
Command: <textarea name='message'></textarea><br/> <input type='submit'/></form>"));
EndBoxA();
}
?>