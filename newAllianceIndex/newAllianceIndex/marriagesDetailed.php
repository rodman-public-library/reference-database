<?php
	//includes the connection file
	session_start();
	include 'includes/connect.inc.php';
	$recordNum = $_GET['recordNumPassed'];
	$key = array_search($recordNum, $_SESSION['inNavM']);
	$totalNumberItems = count($_SESSION['inNavM']);
	$backrecord = $key - 1;
	$forwardRecord = $key + 1;
	$checkSame = 0;
	if ($forwardRecord === $totalNumberItems){
		$checkSame = 1;
	}
	$sql = "Select groom, bride, newspaperTitle, marriageDate, page, event, illustration From Marriages Where recordNUM = ". $recordNum . ";";
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
		$recordNum = $_SESSION['inNavM'][$backrecord];
		$recordNumFor = $_SESSION['inNavM'][$forwardRecord];
		
		echo '<a href="marriageDetailed.php?recordNumPassed='. $recordNumFor .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;">&#8594;</a>';
		echo '<a href="marriageDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;">&#8592;</a>';
	}
	
	elseif($checkSame === 1){
		$recordNum = $_SESSION['inNavM'][$backrecord];
		echo '<a href="marriageDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;">&#8592;</a>';
	}
	elseif($backrecord <= 0){
		$recordNum = $_SESSION['inNavM'][$forwardRecord];
		echo '<a href="marriageDetailed.php?recordNumPassed='. $recordNum .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;">&#8594;</a>';
	}
	?> 
	<section id="resultsTable">
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Spouse:</p>
            </div>
            <div class="col">
                <p><?php echo $row['groom']; ?></p>
            </div>
        </div>
		<div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Spouse:</p>
            </div>
            <div class="col">
                <p><?php echo $row['bride']; ?></p>
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
                <p><?php echo $row['marriageDate']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Page:</p>
            </div>
            <div class="col">
                <p><?php echo $row['page']; ?></p>
            </div>
        </div>
        <div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Event:</p>
            </div>
            <div class="col">
                <p><?php echo $row['event']; ?></p>
            </div>
        </div>
		<div class="row" id="detailedRow">
            <div class="col float-left" id="detailedResults" style="width: 15%;">
                <p>Illustration:</p>
            </div>
            <div class="col">
                <p><?php echo $row['illustration']; ?></p>
            </div>
        </div>
		<p class="copyright" id="copyrightPrint">Rodman Public Library © 2019</p>
		<button class="btn btn-primary noPrint" type="button" id="noPrintButton" style="background-color: #3b77b6;color: rgb(255,255,255); margin-bottom: 25px;" onclick="window.print();">Print</button>
		<a class="btn btn-primary noPrint button-universal" href="<?php echo "addToCart.php?recordNum=" . $recordNum. "&table=marriage"; ?>">Add to Cart</a>
	</section>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>