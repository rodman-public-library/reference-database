<?php
	
	session_start();
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$item1 = $_POST['label1'];
	$item1 = $conn->real_escape_string($item1);
	$item2 = $_POST['label2'];
	$item2 = $conn->real_escape_string($item2);
	$item3 = $_POST['label3'];
	$item3 = $conn->real_escape_string($item3);
	$item4 = $_POST['label4'];
	$item4 = $conn->real_escape_string($item4);
	$item5 = $_POST['label5'];
	$item5 = $conn->real_escape_string($item5);
	$item6 = $_POST['label6'];
	$item6 = $conn->real_escape_string($item6);
	$item7 = $_POST['label7'];
	$item7 = $conn->real_escape_string($item7);
	$item8 = $_POST['label8'];
	$item8 = $conn->real_escape_string($item8);
	$item9 = $_POST['label9'];
	$item9 = $conn->real_escape_string($item9);
	$recordNum = $_SESSION["recordNum"];
	$type = $_SESSION["type"];
	$label1 = $_SESSION["label1"];
	$label2 = $_SESSION["label2"];
	$label3 = $_SESSION["label3"];
	$label4 = $_SESSION["label4"];
	$label5 = $_SESSION["label5"];
	$label6 = $_SESSION["label6"];
	$label7 = $_SESSION["label7"];
	$label8 = $_SESSION["label8"];
	$label9 = $_SESSION["label9"];
	if (is_null($item6)){
		$item6 = "";
	}
	if (is_null($item7)){
		$item7 = "";
	}
	if (is_null($item8)){
		$item8 = "";
	}
	$sql;
	if (strlen($item9) == 0){
		$sql = "UPDATE ".$type." SET ".$label1." = '".$item1."', ".$label2." = '".$item2."', ".$label3." = '".$item3."', ".$label4." = '".$item4."', ".$label5." = '".$item5."', ".$label6." = '".$item6."', ".$label7." = '".$item7."', ".$label8." = '".$item8."' WHERE recordNum = ".$recordNum.";";
	}
	else{
		$sql = "UPDATE ".$type." SET ".$label1." = '".$item1."', ".$label2." = '".$item2."', ".$label3." = '".$item3."', ".$label4." = '".$item4."', ".$label5." = '".$item5."', ".$label6." = '".$item6."', ".$label7." = '".$item7."', ".$label8." = '".$item8."', ".$label9." = '".$item9."' WHERE recordNum = ".$recordNum.";";
	}
	$results = $conn->query($sql);
	header('Location: ../editRecord.html');
	
?>