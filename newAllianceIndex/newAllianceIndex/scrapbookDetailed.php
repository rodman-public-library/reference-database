<?php
	session_start();
	//includes the connection file
	include 'includes/connect.inc.php';
	$recordNum = $_GET['recordNumPassed'];
	$key = array_search($recordNum, $_SESSION['inNav']);
	$totalNumberItems = count($_SESSION['inNav']);
	$backrecord = $key - 1;
	$forwardRecord = $key + 1;
	$checkSame = 0;
	if ($forwardRecord === $totalNumberItems){
		$checkSame = 1;
	}
	$sql = "Select title, scrapbookpages, newspaperTitle, date, newspaperPage, summary, subject From scrapbook Where recordNum = ". $recordNum;
	//Opens connection from connection file
	$conn = OpenCon();
	$results = $conn->query($sql);
	CloseCon($conn);
	$row = mysqli_fetch_array($results);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alliance Index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/better-nav.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<style>
		#copyrightPrint{
				display: none;
		}
		
		@media print{    
			.no-print, .no-print *{
				display: none !important;
			}
			#noPrintFooter{
				display: none !important;
			}
			#noPrintButton{
				display: none !important;
			}
			#copyrightPrint{
				display: block !important;
			}
		}
	
	</style>
</head>

<body>
    <?php include 'includes/header.inc.php';   
    if($backrecord >= 0 & $checkSame === 0){
		$recordNum = $_SESSION['inNav'][$backrecord];
		$recordNumFor = $_SESSION['inNav'][$forwardRecord];
		
		echo '<a href="scrapbookDetailed.php?recordNumPassed='. $recordNumFor .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;">&#8594;</a>';
		echo '<a href="scrapbookDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;">&#8592;</a>';
	}
	
	elseif($checkSame === 1){
		$recordNum = $_SESSION['inNav'][$backrecord];
		echo '<a href="scrapbookDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;">&#8592;</a>';
	}
	elseif($backrecord <= 0){
		$recordNum = $_SESSION['inNav'][$forwardRecord];
		echo '<a href="scrapbookDetailed.php?recordNumPassed='. $recordNum .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;">&#8594;</a>';
	}
	?>    
    <section id="resultsTable">
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Title:</p>
            </div>
            <div class="col">
                <p><?php echo $row['title']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Newspaper Title:</p>
            </div>
            <div class="col">
                <p><?php echo $row['newspaperTitle']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Date:</p>
            </div>
            <div class="col">
                <p><?php echo $row['date']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Scrapbook Page:</p>
            </div>
            <div class="col">
                <p><?php echo $row['scrapbookpages']; ?></p>
            </div>
        </div>
		<div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Newspaper Page:</p>
            </div>
            <div class="col">
                <p><?php echo $row['newspaperPage']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Summary:</p>
            </div>
            <div class="col">
                <p><?php echo $row['summary']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Subject:</p>
            </div>
            <div class="col">
                <p><?php echo $row['subject']; ?></p>
            </div>
        </div>
		<p class="copyright" id="copyrightPrint">Rodman Public Library © 2019</p>
		<button class="btn btn-primary noPrint" type="button" id="noPrintButton" style="background-color: #3b77b6;color: rgb(255,255,255); margin-bottom: 25px;" onclick="window.print();">Print</button>
		<a class="btn btn-primary noPrint button-universal" href="<?php echo "addToCart.php?recordNum=" . $recordNum. "&table=scrapbook"; ?>">Add to Cart</a>
	</section>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>