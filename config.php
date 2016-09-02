<?php

$project_path = __DIR__;

$twilio_sdk_path = $project_path."/twilio-php-master/Twilio/autoload.php";
$temp_path = $project_path."/temp";
$recordings_path = $project_path."/recordings";

$twilio_sid = "";
$twilio_token = "";
$twilio_redirect_num = ""; // incoming call will be re directed to this twilio number. Please setup voice url as in README doc.
$agent_number = ""; // phone number of agent.