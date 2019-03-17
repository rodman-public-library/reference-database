<?php
	session_start();
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	if(isset($_SESSION['cart'])){
		//Loop through it like any other array.
		$a=0;
		foreach($_SESSION['cart'] as $sql){
			//Print out the product ID.
			$a++;
			$results{$a} = $conn->query($sql);
		}
		foreach($_SESSION['typeCart'] as $typeCart){
			//Print out the product ID.
			$c++;
			$type{$c} = $typeCart;
		}
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
    <section id="resultsTable">
        <div class="table-responsive" id="table-no-last">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name / Title</th>
                        <th>Newspaper Title</th>
                        <th>Date</th>
                        <th>Page</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						for($b = 1; $b <= $a; $b++){
							if($type{$b} === "newspaper"){
								while ($row = mysqli_fetch_array($results{$b})) {
									echo '<tr>';
									for($i = 0; $i <= 3; $i++){
										if($i === 0){
											echo '<td>'. $row['title'] .'</td>';
										}
										elseif($i === 1){
											echo '<td>' . $row['newspaperTitle'] . '</td>';
										}
										elseif($i === 2){
											echo '<td>' . $row['newsDate'] . '</td>';
										}
										elseif($i === 3){
											echo '<td>' . $row['page'] . '</td>';
										}
									}
								}
							}
							elseif($type{$b} === "obit"){
								while ($row = mysqli_fetch_array($results{$b})) {
									echo '<tr>';
									for($i = 0; $i <= 3; $i++){
										if($i === 0){
											echo '<td>'. $row['Name'] .'</td>';
										}
										elseif($i === 1){
											echo '<td>' . $row['newspaperTitle'] . '</td>';
										}
										elseif($i === 2){
											echo '<td>' . $row['Date'] . '</td>';
										}
										elseif($i === 3){
											echo '<td>' . $row['Page'] . '</td>';
										}
									}
								}
							}
							elseif($type{$b}=== "marriage"){
								while ($row = mysqli_fetch_array($results{$b})) {
									echo '<tr>';
									for($i = 0; $i <= 3; $i++){
										if($i === 0){
											echo '<td>'. $row['groom'] . '<br>' . $row['bride'] .'</td>';
										}
										elseif($i === 1){
											echo '<td>' . $row['newspaperTitle'] . '</td>';
										}
										elseif($i === 2){
											echo '<td>' . $row['marriageDate'] . '</td>';
										}
										elseif($i === 3){
											echo '<td>' . $row['page'] . '</td>';
										}
									}
								}
							}
							elseif($type{$b} === "scrapbook"){
								while ($row = mysqli_fetch_array($results{$b})) {
									echo '<tr>';
									for($i = 0; $i <= 2; $i++){
										if($i === 0){
											echo '<td>'. $row['title'] .'</td>';
										}
										elseif($i === 1){
											echo '<td>' . $row['scrapbookPages'] . '</td>';
										}
										elseif($i === 2){
											echo '<td>' . $row['event'] . '</td>';
										}
									}
								}
							}
							echo '</tr>';
						}
?>
                </tbody>
            </table>
        </div>
		<button class="btn btn-primary noPrint" type="button" id="noPrintButton" style="background-color: #3b77b6;color: rgb(255,255,255); margin-bottom: 25px;"><a style = "color: white; text-decoration: none;" href="clearCart.php">Clear Cart</a></button>
		<button class="btn btn-primary noPrint" type="button" id="noPrintButton" style="background-color: #3b77b6;color: rgb(255,255,255); margin-bottom: 25px;"><a style = "color: white; text-decoration: none;" href="sendCart.php">Request Article</a></button>
    </section>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>