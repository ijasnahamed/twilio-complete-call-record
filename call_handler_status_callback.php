<?php
require_once "config.php";
require_once "header.php";

$call_temp_file = $temp_path."/".$_REQUEST["CallSid"].".txt";

if(!file_exists($call_temp_file))
{
	file_put_contents($call_temp_file, json_encode(array("recording_url_1" = > $_REQUEST["RecordingUrl"]))); // writes recording url of first call.
}
else
{
	$call_recording_urls = json_decode(file_get_contents($call_temp_file), true);
	$call_recording_urls["recording_url_2"] = $_REQUEST["RecordingUrl"]; // add recording url for second call.
	file_put_contents($call_temp_file, json_encode($call_recording_urls));
}

require_once "footer.php";