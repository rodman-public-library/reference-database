<?php
	session_start();
	if(isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	if(!isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	$_SESSION['inNavM'] = array();
	//includes the connection file
	include 'includes/connect.inc.php';
	$keyword = $_GET['keywordSearch'];
	$date = $_GET['dateSearch'];
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	if($checkSpace === 1 && !empty($keyword) && !empty($date)){
		$sql = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "%') OR (groom LIKE '%";
		$sql3 = "%') AND marriageDate = '".$date."') Order BY marriageDate DESC";
		foreach ($words as $word){
			$sql .= $word ."%' AND bride LIKE '%";
			$sql2 .= $word ."%' AND groom LIKE '%";
		}
		$sql = substr($sql, 0, -20);
		$sql2 = substr($sql2, 0, -20);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') Order BY marriageDate DESC";
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') AND marriageDate = '".$date."') Order BY marriageDate DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword ." %') Order BY marriageDate DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') Order BY marriageDate DESC";
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
		<h1>Marriages</h1>
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
										$_SESSION['inNavM'][] = $row['recordNum'];
										$_SESSION['navCounter']++;
										echo '<td><a href="marriageDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['groom'] .'<br>' . $row['bride'] . '</a></td>';
									}
									elseif($i === 1){
										echo '<td>' . $row['marriageDate'] . '</td>';
									}
									elseif($i === 2){
										echo '<td>' . $row['page'] . '</td>';
									}
									elseif($i === 3){
										echo '<td><i class="fas fa-hand-holding-heart"></i></td>';
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