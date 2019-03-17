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
		$sql = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, age, recordNum FROM catholic) base WHERE (firstLast LIKE '% ";
		$words = explode(" ", $keyword);
		$sql3 = " %' AND deathDate = '".$date."') Order BY deathDate DESC";
		foreach ($words as $word){
			$sql .= $word ." %' AND firstLast LIKE '% ";
		}
		$sql = substr($sql, 0, -26);
		//$sql2 = substr($sql2, 0, -24);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, age, recordNum FROM catholic) base WHERE (firstLast LIKE '% ";
		$words = explode(" ", $keyword);
		$sql3 = " %') Order BY deathDate DESC";
		$countDigit;
		foreach($words as $i){
			$countDigit++;
		}
		foreach ($words as $word){
			$sql .= $word ." %' AND firstLast LIKE '% ";
			$nI++;
		}
		$sql = substr($sql, 0, -26);
		$sql .= $sql3;
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName,' ') as firstlast, age, recordNum FROM catholic) base WHERE (firstLast LIKE '% ".$keyword." %' AND deathDate = '".$date."') Order BY deathDate DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, age, recordNum FROM catholic) base WHERE deathDate = '". $date ."' Order BY deathDate DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, age, recordNum FROM catholic) base WHERE firstlast LIKE '% ". $keyword ." %' Order BY deathDate DESC";
	}
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
		<h1>Catholic Obituaries</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Death Date</th>
                        <th>Age</th>
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
										echo '<td><a href="catholicDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['firstlast'] .'</a></td>';
									}
									elseif($i === 1){
										echo '<td>' . $row['deathDate'] . '</td>';
									}
									elseif($i === 2){
										echo '<td>' . $row['age'] . '</td>';
									}
									elseif($i === 3){
										echo '<td><i class="far fa-id-badge"></i></i></td>';
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