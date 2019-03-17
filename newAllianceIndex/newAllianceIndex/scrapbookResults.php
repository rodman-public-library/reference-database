<?php
	session_start();
	if(isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	if(!isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	$_SESSION['inNav'] = array();
	//includes the connection file
	include 'includes/connect.inc.php';
	$keyword = $_POST['keywordSearch'];
	$date = $_POST['dateSearch'];
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	if($checkSpace === 1 && !empty($keyword) && !empty($date)){
		$sql = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "  %' AND date = '".$date."') OR (summary LIKE '%";
		$sql3 = "  %' AND date = '".$date."') Order BY date DESC";
		foreach ($words as $word){
			$sql .= $word ." %' AND title LIKE '%";
			$sql2 .= $word ." %' AND subject LIKE '%";
		}
		$sql = substr($sql, 0, -20);
		$sql2 = substr($sql2, 0, -24);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "%') OR (subject LIKE '%";
		$sql3 = "%') Order BY date DESC";
		$countDigit;
		foreach($words as $i){
			$countDigit++;
		}
		foreach ($words as $word){
			$sql .= $word ."%' AND title LIKE '%";
			$sql2 .= $word ."%' AND subject LIKE '%";
			$nI++;
		}
		$sql = substr($sql, 0, -21);
		$sql2 = substr($sql2, 0, -23);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '% ".$keyword."  %' AND date = '".$date."') OR (summary LIKE '% ".$keyword."  %' AND newsDate = '".$date."') Order BY date DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where date = '". $date ."' Order BY date DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '% " .$keyword. "  %' or  title LIKE '% " .$keyword. " %' or subject LIKE '% " .$keyword. " %' or event LIKE '% " .$keyword. " %' or summary LIKE '% " .$keyword. " %') Order BY date DESC";
	}
	//Opens connection from connection file
	$conn = OpenCon();
	$results = $conn->query($sql);
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
</head>

<body>
    <?php include 'includes/header.inc.php'; ?>   
    <section id="resultsTable">
		<h1>Scrapbook</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Page</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$i = 0;
						while ($row = mysqli_fetch_array($results)) {
							echo '<tr>';
							for($i = 0; $i <= 4; $i++){
									if($i === 0){
										$_SESSION['inNav'][] = $row['recordNum'];
										$_SESSIONp['navCounter']++;
										echo '<td><a href="scrapbookDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['title'] .'</a></td>';
									}
									elseif($i === 1){
										echo '<td>' . $row['date'] . '</td>';
									}
									elseif($i === 2){
										echo '<td>' . $row['scrapbookpages'] . '</td>';
									}
									elseif($i === 3){
										echo '<td><i class="fa fa-book"></i></td>';
									}
									elseif($i === 4){
										echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
									}
							}
							$i = 0;
							echo'</tr>';
						}
					?>
                </tbody>
            </table>
        </div>
    </section>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>