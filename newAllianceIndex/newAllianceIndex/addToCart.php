<?php

	$recordNum = $_GET['recordNum'];
	$tableType = $_GET['table'];
	
	session_start();
	if(!isset($_SESSION['counter'])){
		$_SESSION['counter'] = 0;
	}
	$_SESSION['counter']++;
	if($tableType === "newspaper"){
		$_SESSION['cart'][$_SESSION['counter']] = "SELECT title, newspaperTitle, newsDate, page FROM newspaper WHERE recordNum= " . $recordNum .";";
		$_SESSION['typeCart'][$_SESSION['counter']] = "newspaper";
	}
	if($tableType === "obit"){
		$_SESSION['cart'][$_SESSION['counter']] = "SELECT Name, newspaperTitle, Date, Page FROM Obituaries WHERE recordNum= " . $recordNum .";";
		$_SESSION['typeCart'][$_SESSION['counter']] = "obit";
	}
	if($tableType === "marriage"){
		$_SESSION['cart'][$_SESSION['counter']] = "SELECT groom, bride, marriageDate, newspaperTitle, page FROM Marriages WHERE recordNum= " . $recordNum .";";
		$_SESSION['typeCart'][$_SESSION['counter']] = "marriage";
	}
	if($tableType === "scrapbook"){
		$_SESSION['cart'][$_SESSION['counter']] = "SELECT title, scrapbookpages, date, event FROM scrapbook WHERE recordNum= " . $recordNum .";";
		$_SESSION['typeCart'][$_SESSION['counter']] = "scrapbook";
	}
?>
<!DOCTYPE html>
<html>
	<head>
	
	<script>
	
		function goBack() {
			window.history.go(-2);
		}
		window.onload = goBack();
	
	</script>
	
	</head>
<body>


</body>
</html>