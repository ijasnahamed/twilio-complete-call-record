<?php
require_once "config.php";
require_once "header.php";

echo '<Dial action="call_handler_status_callback.php" record="record-from-ringing">';
echo '<Number>'.$twilio_redirect_num.'</Number>';
echo '</Dial>';

require_once "footer.php";