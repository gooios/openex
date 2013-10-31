<?php
StartBox("Reg");
NewRow(array("<form action='index.php?Page=ChangeReg' method='POST'>
<input type='text' name='Max' maxlength='2' value='$usermax'/>Max<input type='text' name='Min' value='$usermin' maxlength='3'/>Min
<input type='submit'/>
</form>"));
EndBox();
?>