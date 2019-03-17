<?php
	session_start();
	if (is_null($_SESSION["usernamePassing"])){
		header('Location: login.php?userorpassincorect=true');
	}
	include 'includes/connect.inc.php';
	$tableType = $_POST['tableType'];
	$recordNum = $_POST['recordNum'];
	$_SESSION["recordNum"] = $recordNum;
	
	if($tableType == 'newspaper'){
		$sql = "Select * From newspaper WHERE recordNUM = ".$recordNum.";";
		$conn = OpenCon();
		$results = $conn->query($sql);
		$i = 0;
		while ($row = mysqli_fetch_array($results)) {
			$item1 = $row['title'];
			$item2 = $row['newspaperTitle'];
			$item3 = $row['newsDate'];
			$item4 = $row['page'];
			$item5 = $row['transcription'];
			$item6 = $row['summary'];
			$item7 = $row['subject'];
			$item8 = $row['event'];
			$item9 = $row['yearColumn'];
			$type = "Newspaper";
			$_SESSION["label1"] = 'Title';
			$_SESSION["label2"] = 'newspaperTitle';
			$_SESSION["label3"] = 'newsDate';
			$_SESSION["label4"] = 'page';
			$_SESSION["label5"] = 'transcription';
			$_SESSION["label6"] = 'summary';
			$_SESSION["label7"] = 'subject';
			$_SESSION["label8"] = 'event';
			$_SESSION["label9"] = 'yearColumn';
			$_SESSION["type"] = 'newspaper';
		}
	}
	elseif($tableType == 'obit'){
		$sql = "Select * From Obituaries WHERE recordNum = ".$recordNum.";";
		$conn = OpenCon();
		$results = $conn->query($sql);
		$i = 0;
		while ($row = mysqli_fetch_array($results)) {
			$item1 = $row['Name'];
			$item2 = $row['Title'];
			$item3 = $row['Date'];
			$item4 = $row['newspaperTitle'];
			$item5 = $row['Page'];
			$item6 = $row['Transcription'];
			$item7 = $row['Summary'];
			$item8 = $row['Event'];
			$type = "Obit";
			$_SESSION["label1"] = 'Name';
			$_SESSION["label2"] = 'Title';
			$_SESSION["label4"] = 'newspaperTitle';
			$_SESSION["label3"] = 'Date';
			$_SESSION["label5"] = 'Page';
			$_SESSION["label6"] = 'Transcription';
			$_SESSION["label7"] = 'Summary';
			$_SESSION["label8"] = 'Event';	
			$_SESSION["type"] = 'Obituaries';
		}
	}
	elseif($tableType == 'marriage'){
		$sql = "Select * From Marriages WHERE recordNum = ".$recordNum.";";
		$conn = OpenCon();
		$results = $conn->query($sql);
		$i = 0;
		while ($row = mysqli_fetch_array($results)) {
			$item1 = $row['groom'];
			$item2 = $row['bride'];
			$item3 = $row['marriageDate'];
			$item4 = $row['newspaperTitle'];
			$item5 = $row['page'];
			$item6 = $row['transcription'];
			$item7 = $row['summary'];
			$item8 = $row['event'];
			$type = "Marriage";
			$_SESSION["label1"] = 'groom';
			$_SESSION["label2"] = 'bride';
			$_SESSION["label3"] = 'marriageDate';
			$_SESSION["label4"] = 'newspaperTitle';
			$_SESSION["label5"] = 'page';
			$_SESSION["label6"] = 'transcription';
			$_SESSION["label7"] = 'summary';
			$_SESSION["label8"] = 'event';
			$_SESSION["type"] = 'Marriages';
		}
	}
	elseif($tableType == 'scrapbook'){
		$sql = "Select * From scrapbook WHERE recordNum = ".$recordNum.";";
		$conn = OpenCon();
		$results = $conn->query($sql);
		$i = 0;
		while ($row = mysqli_fetch_array($results)) {
			$item1 = $row['title'];
			$item2 = $row['scrapbookpages'];
			$item3 = $row['date'];
			$item4 = $row['newspaperTitle'];
			$item5 = $row['newpaperPage'];
			$item6 = $row['transcription'];
			$item7 = $row['summary'];
			$item8 = $row['subject'];
			$item9 = $row['event'];
			$type = "Scrapbook";
			$_SESSION["label1"] = 'title';
			$_SESSION["label2"] = 'scrapbookPages';
			$_SESSION["label3"] = 'date';
			$_SESSION["label4"] = 'newspaperTitle';
			$_SESSION["label5"] = 'newpaperPage';
			$_SESSION["label6"] = 'transcription';
			$_SESSION["label7"] = 'summary';
			$_SESSION["label8"] = 'subject';
			$_SESSION["label9"] = 'event';
			$_SESSION["type"] = 'scrapbook';
		}
	}
	else{
		echo 'error';
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alliance Index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/better-nav.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php include 'includes/header.inc.php'; ?> 
    <div class="login-clean">
        <form method="post" style="background-color: #3b77b6;" action="confirm/confirmEdit.php">
            <h1 class="text-center" style="color: rgb(255,255,255);">Edit Record</h1>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label1"]; ?>:</label><input class="form-control" type="text" name="label1" required="" placeholder="Doe, John" value="<?php echo $item1; ?>"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label2"]; ?>:</label><input class="form-control" type="text" name="label2" required="" placeholder="Obituary" value="<?php echo $item2; ?>"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label3"]; ?>:</label><input class="form-control" type="date" name="label3" value="<?php echo $item3; ?>"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label4"]; ?>:</label><input class="form-control" type="text" name="label4" placeholder=""  value="<?php echo $item4; ?>"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label5"]; ?>:</label><textarea class="form-control" name="label5"><?php echo $item5; ?></textarea></div>
            <div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label6"]; ?>:</label><textarea class="form-control" name="label6"><?php echo $item6; ?></textarea></div>
			<div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label7"]; ?>:</label><textarea class="form-control" name="label7"><?php echo $item7; ?></textarea></div>
			<div class="form-group"><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label8"]; ?>:</label><textarea class="form-control" name="label8"><?php echo $item8; ?></textarea></div>
			<div class="form-group"><label style="display: none;">recordNum:</label><input class="form-control" type="text" name="recordNum" placeholder=""  value="<?php	echo $recordNum ?>" style="display: none;"></div>
			<div class="form-group"<?php if(is_null($item9)){ echo 'style="display: none;"';} ?>><label style="color: rgb(255,255,255);"><?php echo $_SESSION["label9"]; ?>:</label><textarea class="form-control" name="label9"><?php echo $item9; ?></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="color: #3b77b6;background-color: rgb(255,255,255);">Submit</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>
