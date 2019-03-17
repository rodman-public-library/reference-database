<?php

	include 'connect.inc.php';
	
	$key = "RPLAI";
	$username = "kperone2018Oct";
	$password = "deathByFlute2019";
	echo sha1($key.$username.$password);
?>