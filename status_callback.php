<?php
require_once "config.php";

$call_temp_file = $temp_path."/".$_REQUEST["CallSid"].".txt";

if(file_exists($call_temp_file))
{
	$recording_urls = json_decode($call_temp_file, true); // get call recording urls

	$merge_audio_name = "";
	$recording_list = array();

	foreach ($recording_urls as $key => $value)
	{
		$filename=array_pop(explode("/",$value));
		$temp_file_name = $temp_path."/".$filename.".wav";
		exec("wget -O $temp_file_name $value.wav"); // download recodings from twilio to local server.

		if(file_exists($temp_file_name))
		{
			$recording_list[] = $temp_file_name;
			$merge_audio_name .= $filename;
		}
	}

	if(count($recording_list)==1)
	{
		exec("mv ".$recording_list[0]." ".$recordings_path."/");
	}
	else if(count($recording_list)>1)
	{
		$merge_audio_name .= ".wav";
		$cmd = "sox ";
		foreach ($recording_list as $key => $value)
		{
			$cmd .= $value." ";
		}
		$cmd .= $recordings_path."/".$merge_audio_name;

		exec($cmd); // concatenate two leg recordings to one

		foreach ($recording_list as $key => $value)
		{
			unlink($value);
		}

	}
}