<?php
	function OpenCon(){
		$dbhost = "MySQL-database-location";
		$dbuser = "username";
		$dbpass = "user-password";
		$db = "MySQL-database-name";		 
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);		 
		return $conn;
	}	
	function CloseCon($conn){
		$conn -> close();
	}
?>