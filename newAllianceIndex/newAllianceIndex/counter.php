<?php

	$handle = fopen("counter.txt", "r");
	date_default_timezone_set('America/New_York');
	$date = date('m/d/Y h:i:s a', time());
	
	if(!$handle){
		echo "No file";
	}
	else{
		$file = fopen("counter.txt","a+");
		$ip= $_SERVER['REMOTE_ADDR'] . " ". $date .PHP_EOL;
		fwrite($file, "\n" . $ip . PHP_EOL);
		fclose($file);
	}
?>