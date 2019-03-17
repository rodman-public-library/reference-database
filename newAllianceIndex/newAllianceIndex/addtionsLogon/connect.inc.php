<?php
	function OpenCon(){
		$dbhost = "db770734867.hosting-data.io";
		$dbuser = "dbo770734867";
		$dbpass = "RPLin2019Cre@ted";
		$db = "db770734867";		 
		//DO NOT TOUCH BELOW THIS LINE
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);		 
		return $conn;
	}	
	function CloseCon($conn){
		$conn -> close();
	}
?>