<?php
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$name = $_POST['name'];
	$name = $conn->real_escape_string($name);
	$title = $_POST['title'];
	$date = $_POST['date'];
	$page = $_POST['page'];
	$transcription = $_POST['transcription'];
	$summary = $_POST['summary'];
	$illustration = 'N';
	$subStr = ' il.';
	if (strpos($name, $subStr) !== false) {
		$illustration = 'Y';
		$name = str_replace("il.", " ", $name);
	}
	
	if (strlen($transcription) == 0){
		if (strlen($summary) == 0){
			$sql = "INSERT INTO Obituaries (Name, Title, newspaperTitle, Date, Page, Event, illustration) VALUES ('".$name."', '".$title."', 'The Alliance Review', '".$date."', '".$page."', 'Obituary', '".$illustration."');";
		}
		else{
			$sql = "INSERT INTO Obituaries (Name, Title, newspaperTitle, Date, Page, Summary, Event, illustration) VALUES ('".$name."', '".$title."', 'The Alliance Review', '".$date."', '".$page."', '".$summary."', 'Obituary', '".$illustration."');";
		}
	}
	else{
		if (strlen($summary) == 0){
			$sql = "INSERT INTO Obituaries (Name, Title, newspaperTitle, Date, Page, Transcription, Event, illustration) VALUES ('".$name."', '".$title."', 'The Alliance Review', '".$date."', '".$page."', '".$transcription."', 'Obituary', '".$illustration."');";
		}
		else{
			$sql = "INSERT INTO Obituaries (Name, Title, newspaperTitle, Date, Page, Transcription, Summary, Event, illustration) VALUES ('".$name."', '".$title."', 'The Alliance Review', '".$date."',  '".$page."', '".$transcription."', '".$summary."', 'Obituary', '".$illustration."');";
		}
	}
	$results = $conn->query($sql);
	header('Location: ../obitAdd.php');