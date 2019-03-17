<?php
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$spouse1 = $_POST['spouse1'];
	$spouse1 = $conn->real_escape_string($spouse1);
	$spouse2 = $_POST['spouse2'];
	$spouse2 = $conn->real_escape_string($spouse2);
	$date = $_POST['date'];
	$page = $_POST['page'];
	$transcription = $_POST['transcription'];
	$summary = $_POST['summary'];
	$summary = $conn->real_escape_string($summary);
	
	if (strlen($transcription) == 0){
		if (strlen($summary) == 0){
			$sql = "INSERT INTO Marriages (bride, groom, newspaperTitle, marriageDate, page, event) VALUES ('".$spouse1."', '".$spouse2."', 'The Alliance Review', '".$date."', '".$page."' , 'Marriage');";
		}
		else{
			$sql = "INSERT INTO Marriages (bride, groom, newspaperTitle, marriageDate, page, event, summary) VALUES ('".$spouse1."', '".$spouse2."', 'The Alliance Review', '".$date."', '".$page."' , 'Marriage', '".$summary."');";
		}
	}
	else{
		if (strlen($summary) == 0){
			$sql = "INSERT INTO Marriages (bride, groom, newspaperTitle, marriageDate, page, event, transcription) VALUES ('".$spouse1."', '".$spouse2."', 'The Alliance Review', '".$date."', '".$page."' , 'Marriage', '".$transcription."');";
		}
		else{
			$sql = "INSERT INTO Marriages (bride, groom, newspaperTitle, marriageDate, page, event, transcription, summary) VALUES ('".$spouse1."', '".$spouse2."', 'The Alliance Review', '".$date."', '".$page."', 'Marriage', '".$transcription."', '".$summary."');";
		}
	}
	$results = $conn->query($sql);
	header('Location: ../marriagesAdd.php');