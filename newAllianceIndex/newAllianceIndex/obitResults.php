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
	$month = date("m", strtotime($date));
	$day = date("d", strtotime($date));
	if($month === '01' && $day = '01'){
		$year = date("Y", strtotime($date));
		$justYear = 1;
	}
	else{
		$justYear = 0;
	}
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	if($checkSpace === 1 && !empty($keyword) && !empty($date)){
		$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "%' AND Date = '".$date."') ORDER By Date DESC";
		foreach ($words as $word){
			$sql .= $word ."%' AND Name LIKE '%";
		}
		$sql = substr($sql, 0, -19);
		$sql .= $sql2;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "%') ORDER By Date DESC";
		foreach ($words as $word){
			$sql .= $word ."%' AND Name LIKE '%";
		}
		$sql = substr($sql, 0, -19);
		$sql .= $sql2;
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%".$keyword."%' AND Date = '".$date."') ORDER By Date DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where Date = '". $date ."' ORDER By Date DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where Name LIKE '%". $keyword ."%' ORDER By Date DESC";
	}
	if($justYear === 1){
		if(strpos($keyword, ' ') !== false){
			$checkSpace = 1;
		}
		if($checkSpace === 1 && !empty($keyword) && !empty($date)){
			$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%";
			$words = explode(" ", $keyword);
			$sql2 = "%' AND yearColumn = '". $year. "') ORDER By Date DESC";
			foreach ($words as $word){
				$sql .= $word ."%' AND Name LIKE '%";
			}
			$sql = substr($sql, 0, -19);
			$sql .= $sql2;
		}
		elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
			$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%";
			$words = explode(" ", $keyword);
			$sql2 = "%') ORDER By Date DESC";
			foreach ($words as $word){
				$sql .= $word ."%' AND Name LIKE '%";
			}
			$sql = substr($sql, 0, -19);
			$sql .= $sql2;
		}
		elseif (!empty($keyword) && !empty($date)) {
			//header("Location: newspaperSearch.html?bothFilled");
			$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where (Name LIKE '%".$keyword."%' AND yearColumn = '".$year."') ORDER By Date DESC";
		}
		elseif (empty($keyword)) {
			if (empty($date)) {
				header("Location: newspaperSearch.html?bothEmpty");
			}
			else{
				$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where yearColumn = '". $year ."' ORDER By Date DESC";
			}
		}
		elseif (!empty($keyword)) {
			$sql = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where Name LIKE '%". $keyword ."%' ORDER By Date DESC";
		}
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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
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
        <h1>Obituaries</h1>
        <div class="table-responsive" id="table-no-last">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Page</th>
                        <th>Type</th>
                        <th style="display: none;">Blank</th>
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
										echo '<td><a href="obitDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['Name'] .'</a></td>';
									}
									elseif($i === 1){
										echo '<td>' . $row['Date'] . '</td>';
									}
									elseif($i === 2){
										echo '<td>' . $row['Page'] . '</td>';
									}
									elseif($i === 3){
										echo '<td><i class="fa fa-user-circle"></i></td>';
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