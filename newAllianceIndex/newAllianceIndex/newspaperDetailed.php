<?php
	session_start();
	//includes the connection file
	include 'includes/connect.inc.php';
	$recordNum = $_GET['recordNumPassed'];
	$recordNumPassed = $_GET['recordNumPassed'];
	$key = array_search($recordNum, $_SESSION['inNavN']);
	$totalNumberItems = count($_SESSION['inNavN']);
	$backrecord = $key - 1;
	$forwardRecord = $key + 1;
	$checkSame = 0;
	if ($forwardRecord === $totalNumberItems){
		$checkSame = 1;
	}
	$sql = "Select title, newspaperTitle, newsDate, page, summary, subject, illustration From newspaper Where recordNUM = ". $recordNum . ";";
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
	<script>
	var i = 0;
	function setCookie(recordNum, table) {
		i++;
		console.log(i);
		document.cookie = "recordNumAndTable" + i + "=" + recordNum + "&" + table;
	}
	</script>
</head>

<body>
    <?php include 'includes/header.inc.php';   
    if($backrecord >= 0 & $checkSame === 0){
		$recordNum = $_SESSION['inNavN'][$backrecord];
		$recordNumFor = $_SESSION['inNavN'][$forwardRecord];
		
		echo '<a href="newspaperDetailed.php?recordNumPassed='. $recordNumFor .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;" title="Next Record">&#8594;</a>';
		echo '<a href="newspaperDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;" title="Back Record">&#8592;</a>';
	}
	
	elseif($checkSame === 1){
		$recordNum = $_SESSION['inNavN'][$backrecord];
		echo '<a href="newspaperDetailed.php?recordNumPassed='. $recordNum. '"style="float: right; padding-left:1em; font-size: 32px;" title="Back Record">&#8592;</a>';
	}
	elseif($backrecord <= 0){
		$recordNum = $_SESSION['inNavN'][$forwardRecord];
		echo '<a href="newspaperDetailed.php?recordNumPassed='. $recordNum .'"style="float: right; padding-left:1em; margin-right: 1em; font-size: 32px;" title="Next Record">&#8594;</a>';
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
                <p><?php echo $row['newsDate']; ?></p>
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
		<a class="btn btn-primary noPrint button-universal" href="<?php echo "addToCart.php?recordNum=" . $recordNumPassed. "&table=newspaper"; ?>">Add to Cart</a>
		
    </section>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>