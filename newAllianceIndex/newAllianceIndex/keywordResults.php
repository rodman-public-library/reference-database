<?php

	session_start();
	if(isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	if(!isset($_SESSION['navCounter'])){
		$_SESSION['navCounter'] = 0;
	}
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$keyword = $_POST['keywordSearch'];
	$keyword = $conn->real_escape_string($keyword);
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	//This if statement is for multiple word searches
	if($checkSpace === 1){
		$sqlNewspaper = "Select title, newsDate, recordNum FROM `newspaper` Where (title LIKE '% ";
		$words = explode(" ", $keyword);
		$sqlNewspaper2 = " %') OR (summary LIKE '% ";
		$sqlNewspaper3 = " %') ORDER By newsDate DESC";
		foreach ($words as $word){
			$sqlNewspaper .= $word ." %' AND title LIKE '% ";
			$sqlNewspaper2 .= $word ." %' AND summary LIKE '% ";
		}
		$sqlNewspaper = substr($sqlNewspaper, 0, -22);
		$sqlNewspaper2 = substr($sqlNewspaper2, 0, -24);
		$sqlNewspaper .= $sqlNewspaper2;
		$sqlNewspaper .= $sqlNewspaper3;
		
		$sqlObit = "Select Name, Date, recordNum FROM `Obituaries` Where (Name LIKE '%";
		$sqlObit2 = "%') ORDER By Date DESC";
		foreach ($words as $word){
			$sqlObit .= $word ."%' AND Name LIKE '%";
		}
		$sqlObit = substr($sqlObit, 0, -19);
		$sqlObit .= $sqlObit2;
		
		$sqlMarriages = "SELECT groom, bride, marriageDate, recordNum FROM `Marriages` Where (bride LIKE '%";
		$sqlMarriages2 = "%') OR (groom LIKE '%";
		$sqlMarriages3 = "%') Order BY marriageDate DESC";
		foreach ($words as $word){
			$sqlMarriages .= $word ."%' AND bride LIKE '%";
			$sqlMarriages2 .= $word ."%' AND groom LIKE '%";
		}
		$sqlMarriages = substr($sqlMarriages, 0, -20);
		$sqlMarriages2 = substr($sqlMarriages2, 0, -20);
		$sqlMarriages .= $sqlMarriages2;
		$sqlMarriages .= $sqlMarriages3;
		
		$sqlScrapbook = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '%";
		$sqlScrapbook2 = "%') OR (subject LIKE '%";
		$sqlScrapbook3 = ") Order BY date DESC";
		foreach ($words as $word){
			$sqlScrapbook .= $word ."%' AND title LIKE '%";
			$sqlScrapbook .= $word ."%' AND subject LIKE '%";
		}
		$sqlScrapbook = substr($sqlScrapbook, 0, -20);
		$sqlScrapbook2 = substr($sqlScrapbook2, 0, -24);
		$sqlScrapbook .= $sqlScrapbook2;
		$sqlScrapbook .= $sqlScrapbook3;
		
		$sqlCatholic = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, recordNum FROM catholic) base WHERE (firstLast LIKE '%";
		$sqlCatholic2 = "%') Order BY deathDate DESC";
		foreach ($words as $word){
			$sqlCatholic .= $word ."%' AND firstLast LIKE '%";
		}
		$sqlCatholic = substr($sqlCatholic, 0, -26);

		$sqlCatholic .= $sqlCatholic2;
	}
	else{
		//For single word searches
		$sqlNewspaper = "Select title, newsDate, recordNum FROM `newspaper` Where (title LIKE '% ". $keyword ." %' OR summary LIKE '% ". $keyword ." %')";
		$sqlObit = "SELECT Name, Date, Page, Event, recordNum FROM `Obituaries` Where Name LIKE '%". $keyword ."%' ORDER By Date DESC";
		$sqlMarriages = "SELECT groom, bride, marriageDate, page, recordNum FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') Order BY marriageDate DESC";
		$sqlScrapbook = "SELECT title, date, scrapbookpages, subject, recordNum FROM `scrapbook` Where (title LIKE '% " .$keyword. "  %' or  title LIKE '% " .$keyword. " %' or subject LIKE '% " .$keyword. " %' or event LIKE '% " .$keyword. " %' or summary LIKE '% " .$keyword. " %') Order BY date DESC";
		$sqlCatholic = "SELECT * FROM ( SELECT deathDate, CONCAT(' ', lastName, ' , ', firstName, ' ') as firstlast, recordNum FROM catholic) base WHERE firstlast LIKE '% ". $keyword ." %' Order BY deathDate DESC";
		/* echo $sqlNewspaper . '<br>';
		echo $sqlObit . '<br>';
		echo $sqlMarriages . '<br>';
		echo $sqlScrapbook . '<br>';
		echo $sqlCatholic . '<br>'; */
	}
	$counterNews = 0;

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
    <div style="width: 90%;height: 90%;padding: 10%;margin: 5%;">
        <h1>Results</h1>
        <p>Click on type to see details</p>
        <div role="tablist" id="accordion-1" style="width: 100%;height: 100%;background-color: #ffffff;">
            <div class="card" style="background-color: #3b77b6;">
                <div class="card-header" role="tab">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1" style="color: rgb(255,255,255);" id="newspaperCounter">Newspaper</a></h5>
                </div>
                <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1" style="background-color: #ffffff;">
                    <div class="card-body">
                        <section id="resultsTable" style="width: 100%;height: 100%;margin-top: 0;">
                            <div class="table-responsive" id="table-no-last">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$resultsNewspaper = $conn->query($sqlNewspaper);
											$i = 0;
											while ($row = mysqli_fetch_array($resultsNewspaper)) {
												$counterNews++;
												echo '<tr>';
												for($i = 0; $i <= 2; $i++){
														if($i === 0){
															echo '<td><a href="newspaperDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['title'] .'</a></td>';
															//inNav[0] starts.
														}
														elseif($i === 1){
															echo '<td>' . $row['newsDate'] . '</td>';
														}
														elseif($i === 2){
															echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
														}
												}
												$i = 0;
												echo'</tr>';
											}
											echo '<script>document.getElementById("newspaperCounter").innerHTML = "Newspaper\t Count: '. $counterNews .'";</script>';
										?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #3b77b6;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="div#accordion-1 .item-2" style="color: rgb(255,255,255);" id="obitCounter">Obituary</a></h5>
                </div>
                <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <section id="resultsTable" style="width: 100%;height: 100%;margin-top: 0;">
                            <div class="table-responsive" id="table-no-last">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php
											$resultsObit = $conn->query($sqlObit);
											$i = 0;
											$counterObit = 0;
											while ($row = mysqli_fetch_array($resultsObit)) {
												echo '<tr>';
												for($i = 0; $i <= 2; $i++){
														if($i === 0){
															echo '<td><a href="obitDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['Name'] .'</a></td>';
														}
														elseif($i === 1){
															echo '<td>' . $row['Date'] . '</td>';
														}
														elseif($i === 2){
															echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
														}
												}
												$i = 0;
												echo'</tr>';
												$counterObit++;
											}
											echo '<script>document.getElementById("obitCounter").innerHTML = "Obituaries\t Count: '. $counterObit .'";</script>';
										?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #3b77b6;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3" style="color: rgb(255,255,255);" id="marriageCounter">Marriage</a></h5>
                </div>
                <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <section id="resultsTable" style="width: 100%;height: 100%;margin-top: 0;">
                            <div class="table-responsive" id="table-no-last">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Spouses</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
											$resultsMarriage = $conn->query($sqlMarriages);
											$i = 0;
											$counterMarriage = 0;
											while ($row = mysqli_fetch_array($resultsMarriage)) {
												echo '<tr>';
												for($i = 0; $i <= 2; $i++){
														if($i === 0){
															echo '<td><a href="marriageDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['groom'] .'<br>' . $row['bride'] .'</a></td>';
														}
														elseif($i === 1){
															echo '<td>' . $row['marriageDate'] . '</td>';
														}
														elseif($i === 2){
															echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
														}
												}
												$i = 0;
												echo'</tr>';
												$counterMarriage++;
											}
											echo '<script>document.getElementById("marriageCounter").innerHTML = "Marriage\t Count: '. $counterMarriage .'";</script>';
										?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #3b77b6;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4" style="color: rgb(255,255,255);" id="scrapbookCounter">Scrapbook</a></h5>
                </div>
                <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <section id="resultsTable" style="width: 100%;height: 100%;margin: 0;">
                            <div class="table-responsive" id="table-no-last">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php
											$resultsScrapbook = $conn->query($sqlScrapbook);
											$i = 0;
											$counterScrapbook = 0;
											while ($row = mysqli_fetch_array($resultsScrapbook)) {
												echo '<tr>';
												for($i = 0; $i <= 2; $i++){
														if($i === 0){
															echo '<td><a href="scrapbookDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['title'] .'</a></td>';
														}
														elseif($i === 1){
															echo '<td>' . $row['date'] . '</td>';
														}
														elseif($i === 2){
															echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
														}
												}
												$i = 0;
												echo'</tr>';
												$counterScrapbook++;
											}
											echo '<script>document.getElementById("scrapbookCounter").innerHTML = "Scrapbook\t Count: '. $counterScrapbook .'";</script>';
										?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" style="background-color: #3b77b6;">
                    <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-5" href="div#accordion-1 .item-5" style="color: rgb(255,255,255);" id="catholicCounter">Catholic</a></h5>
                </div>
                <div class="collapse item-5" role="tabpanel" data-parent="#accordion-1">
                    <div class="card-body">
                        <section id="resultsTable" style="width: 100%;height: 100%;margin-top: 0;">
                            <div class="table-responsive" id="table-no-last">
                                <table class="table">
                                    <thead>
                                        <tr>
											<th>Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
										<?php
											$resultsCatholic = $conn->query($sqlCatholic);
											$i = 0;
											$counterCatholic = 0;
											while ($row = mysqli_fetch_array($resultsCatholic)) {
												echo '<tr>';
												for($i = 0; $i <= 2; $i++){
														if($i === 0){
															echo '<td><a href="catholicDetailed.php?recordNumPassed='. $row['recordNum'] .'">'. $row['firstlast'] .'</a></td>';
														}
														elseif($i === 1){
															echo '<td>' . $row['deathDate'] . '</td>';
														}
														elseif($i === 2){
															echo '<!-- This is the record number field. If you need the record number, head to the Ask A Question Page and request it.'. $recordNUMLinkPass.' -->';
														}
												}
												$i = 0;
												echo'</tr>';
												$counterCatholic++;
											}
											echo '<script>document.getElementById("catholicCounter").innerHTML = "Catholic\t Count: '. $counterCatholic .'";</script>';
										?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
		<?php
								
									echo "<br>";
									echo "<br>";
									echo "<br>";
									echo "<br>";
									echo "<br>";
									$totalRecords = $counterCatholic + $counterMarriage + $counterNews + $counterObit + $counterScrapbook;
									echo "Total Records found: " . $totalRecords;
								
								?>
    </div>
	<?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>