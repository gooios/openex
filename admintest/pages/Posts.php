<?php
if(isUserAdmin($loggedInUser->display_username))
{
StartBoxA("Stop spam");
NewRowA(array("Post setings:
<br/>
<a href='Index.php?Page=WordCensor'>Word Censoring</a>"));
EndBoxA();
}
?>