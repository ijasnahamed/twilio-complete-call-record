<?php
require_once "config.php";
require_once "header.php";

if($_REQUEST["Digits"]=="1")
{
	echo '<Say voice="woman">Please hold while we tranfer our call to out agent.</Say>';

	/*
	* Below api will redirect caller's call leg to call_handler_two.php script.
	*/

	$client = new Twilio\Rest\Client($twilio_sid, $twilio_token);

	$call= $client->account->calls->get($_REQUEST['parentCallSid']);

	$call->update(array(
	    "Url" => "call_handler_two.php",
	    "Method" => "POST"
	));
}
else if($_REQUEST["Digits"]=="2")
{
	echo '<Hangup />';
}
else
{
	echo '<Say voice="woman">You entered wrong input. Please try again.</Say>';
	echo '<Gather action="gather_handler.php" numDigits="1" timeout="10">';
	echo '<Say voice="woman">If you like to talk to our agent please press one. Or not, press two or just hangup this call.</Say>';
	echo '</Gather>';
}

require_once "footer.php";