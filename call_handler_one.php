<?php
/*
* For a demo, i am just using a gather from caller is he/she willing to talk to out agent.
* If yes, press 1. Or no, press 2 or hangup this call.
*/

require_once "config.php";
require_once "header.php";

echo '<Gather action="gather_handler.php" numDigits="1" timeout="10">';
echo '<Say voice="woman">If you like to talk to our agent please press one. Or not, press two or just hangup this call.</Say>';
echo '</Gather>';

require_once "footer.php";