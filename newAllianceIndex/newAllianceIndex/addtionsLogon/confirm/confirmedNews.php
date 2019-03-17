<?php
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$title = $_POST['title'];
	$title = $conn->real_escape_string($title);
	$subject = $_POST['subject'];
	$subject = $conn->real_escape_string($subject);
	$date = $_POST['newsDate'];
	$page = $_POST['page'];
	$transcription = $_POST['transcription'];
	$summary = $_POST['summary'];
	$summary = $conn->real_escape_string($summary);
	$illustration = 'N';
	$subStr = ' il.';
	if (strpos($title, $subStr) !== false) {
		$illustration = 'Y';
		$title = str_replace("il.", " ", $title);
	}
	
	if (strlen($transcription) == 0){
		if (strlen($summary) == 0){
			$sql = "INSERT INTO newspaper (title, newspaperTitle, newsDate, Page, subject, event, yearColumn, illustration) VALUES ('".$title."', 'The Alliance Review', '".$date."',  '".$page."', '".$subject."', 'Newspaper Article', YEAR('".$date."'), '".$illustration."');";
		}
		else{
			$sql = "INSERT INTO newspaper (title, newspaperTitle, newsDate, Page, Summary, subject, event, yearColumn, illustration) VALUES ('".$title."', 'The Alliance Review', '".$date."',  '".$page."', '".$summary."', '".$subject."', 'Newspaper Article', YEAR('".$date."'), '".$illustration."');";
		}
	}
	else{
		if (strlen($summary) == 0){
			$sql = "INSERT INTO newspaper (title, newspaperTitle, newsDate, Page, Transcription, subject, event, yearColumn, illustration) VALUES ('".$title."', 'The Alliance Review', '".$date."',  '".$page."', '".$transcription."', '".$subject."', 'Newspaper Article', YEAR('".$date."'), '".$illustration."');";
		}
		else{
			$sql = "INSERT INTO newspaper (title, newspaperTitle, newsDate, Page, Transcription, Summary, subject, event, yearColumn, illustration) VALUES ('".$title."', 'The Alliance Review', '".$date."',  '".$page."', '".$transcription."', '".$summary."', '".$subject."', 'Newspaper Article', YEAR('".$date."'), '".$illustration."');";
		}
	}
	$results = $conn->query($sql);
	header('Location: ../newspaperAdd.php');