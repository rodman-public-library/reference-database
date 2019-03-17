<?php
	
	session_start();
	include 'connect.inc.php';
	
	$key = "RPLAI";
	$username = $_SESSION["usernamePassing"];
	if ($_POST['passwordi'] === $_POST['passwordc']){
		$newPass = $_POST['passwordc'];
		$newHash = sha1($key.$username.$newPass);
		$conn = OpenCon();
		$sql = "UPDATE Users SET `Password` = '". $newHash ."' WHERE Username = '" . $_SESSION["usernamePassing"] . "';";
		$r = $conn->query($sql);
		echo 'Changed Successfully.';
		echo "<a href='recordCreator.php'>Return to Home</a>";
	}
	else{
		echo "Error";
		echo "<a href='recordCreator.php'>Return to Home</a>";
	}

?>