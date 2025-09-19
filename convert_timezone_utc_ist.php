<?php
	//$timestamp = strtotime('2019-03-30T06:05:03+0000');
	$timestamp = strtotime(date('Y-m-dTH:i:s').'+0000');
	//echo date('Y-m-d h:i A', $timestamp).'<br />';

	$dtime = new DateTime("Asia/Dubai");
	$dtime->setTimestamp($timestamp);

	$stringtime = $dtime->format('d-M-Y h:i A');
	echo "Dubai Time: ".$stringtime."<br />";

	$dtime = new DateTime("Asia/Kolkata");
	$dtime->setTimestamp($timestamp);

	$stringtime = $dtime->format('d-M-Y h:i A');
	echo "India Time: ".$stringtime."<br />";
	
?>