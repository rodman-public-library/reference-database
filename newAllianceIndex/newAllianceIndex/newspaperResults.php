<?php
	session_start();
	if(isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	if(!isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	$_SESSION['inNavN'] = array();
	//includes the connection file
	
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$keyword = $_GET['keywordSearch'];
	$keyword = $conn->real_escape_string($keyword);
	$date = $_GET['dateSearch'];
	$month = date("m", strtotime($date));
	$day = date("d", strtotime($date));
	if($month === '01' && $day = '01'){
		$year = date("Y", strtotime($date));
		$justYear = 1;
	}
	else{
		$justYear = 0;
	}
	
	$date = $conn->real_escape_string($date);
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	if($checkSpace === 1 && !empty($keyword) && !empty($date)){
		$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ";
		$words = explode(" ", $keyword);
		$sql2 = " %' AND newsDate = '".$date."') OR (summary LIKE '% ";
		$sql3 = " %' AND newsDate = '".$date."') ORDER By newsDate DESC";
		foreach ($words as $word){
			$sql .= $word ." %' AND title LIKE '% ";
			$sql2 .= $word ." %' AND summary LIKE '% ";
		}
		$sql = substr($sql, 0, -22);
		$sql2 = substr($sql2, 0, -24);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ";
		$words = explode(" ", $keyword);
		$sql2 = " %') OR (summary LIKE '% ";
		$sql3 = " %') ORDER By newsDate DESC";
		$countDigit;
		foreach($words as $i){
			$countDigit++;
		}
		foreach ($words as $word){
			$sql .= $word ." %' AND title LIKE '% ";
			$sql2 .= $word ." %' AND summary LIKE '% ";
			$nI++;
		}
		$sql = substr($sql, 0, -22);
		$sql2 = substr($sql2, 0, -24);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ".$keyword." %' AND newsDate = '".$date."') OR (summary LIKE '% ".$keyword." %' AND newsDate = '".$date."') ORDER By newsDate DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where newsDate = '". $date ."' ORDER By newsDate DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where title LIKE '% ". $keyword ." %' or title LIKE '% ". $keyword .",%' or title LIKE '% ". $keyword .".%' or subject LIKE '% ". $keyword ." %' or subject LIKE '% ". $keyword .",%' or subject LIKE '% ". $keyword .".%' or subject LIKE '% ". $keyword .";%' or event LIKE ' % ". $keyword ." %' or summary LIKE '% ". $keyword ." %' or summary LIKE '% ". $keyword .",%' or summary LIKE '% ". $keyword .".%' ORDER By newsDate DESC";
	}
	if($justYear === 1){
			if(strpos($keyword, ' ') !== false){
				$checkSpace = 1;
			}
			if($checkSpace === 1 && !empty($keyword) && !empty($date)){
				$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ";
				$words = explode(" ", $keyword);
				$sql2 = " %' AND yearColumn = '".$year."') OR (summary LIKE '% ";
				$sql3 = " %' AND yearColumn = '".$year."') ORDER By newsDate DESC";
				foreach ($words as $word){
					$sql .= $word ." %' AND title LIKE '% ";
					$sql2 .= $word ." %' AND summary LIKE '% ";
				}
				$sql = substr($sql, 0, -22);
				$sql2 = substr($sql2, 0, -24);
				$sql .= $sql2;
				$sql .= $sql3;
			}
			elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
				$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ";
				$words = explode(" ", $keyword);
				$sql2 = " %') OR (summary LIKE '% ";
				$sql3 = " %') ORDER By newsDate DESC";
				$countDigit;
				foreach($words as $i){
					$countDigit++;
				}
				foreach ($words as $word){
					$sql .= $word ." %' AND title LIKE '% ";
					$sql2 .= $word ." %' AND summary LIKE '% ";
					$nI++;
				}
				$sql = substr($sql, 0, -22);
				$sql2 = substr($sql2, 0, -24);
				$sql .= $sql2;
				$sql .= $sql3;
			}
			elseif (!empty($keyword) && !empty($date)) {
				//header("Location: newspaperSearch.html?bothFilled");
				$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where (title LIKE '% ".$keyword." %' AND yearColumn = '".$year."') OR (summary LIKE '% ".$keyword." %' AND yearColumn = '".$year."') ORDER By newsDate DESC";
			}
			elseif (empty($keyword)) {
				if (empty($date)) {
					header("Location: newspaperSearch.html?bothEmpty");
				}
				else{
					$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where yearColumn = '". $year ."' ORDER By newsDate DESC";
				}
			}
			elseif (!empty($keyword)) {
				$sql = "SELECT title, newsDate, page, event, recordNUM, yearColumn FROM `newspaper` Where title LIKE '% ". $keyword ." %' or title LIKE '% ". $keyword .",%' or title LIKE '% ". $keyword .".%' or subject LIKE '% ". $keyword ." %' or subject LIKE '% ". $keyword .",%' or subject LIKE '% ". $keyword .".%' or subject LIKE '% ". $keyword .";%' or event LIKE ' % ". $keyword ." %' or summary LIKE '% ". $keyword ." %' or summary LIKE '% ". $keyword .",%' or summary LIKE '% ". $keyword .".%' ORDER By newsDate DESC";
			}
	}
	//Opens connection from connection file
	//echo $sql;
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
		<h1>Newspapers</h1>
		<p> Sort By Year
        <div class="table-responsive">
            <table class="table" id="resultsTableSort">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th onclick="sortTable(0)">Date</th>
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
											$_SESSION['inNavN'][] = $row['recordNUM'];
											$_SESSION['navCounter']++;
											echo '<td><a href="newspaperDetailed.php?recordNumPassed='. $row['recordNUM'] .'">'. $row['title'] .'</a></td>';
										}
										elseif($i === 1){
											echo '<td>' . $row['newsDate'] . '</td>';
										}
										elseif($i === 2){
											echo '<td>' . $row['page'] . '</td>';
										}
										elseif($i === 3){
											echo '<td><i class="far fa-newspaper"></i></td>';
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