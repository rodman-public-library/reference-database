<?php
	session_start();
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	$tableBody = "";
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
	for($b = 1; $b <= $a; $b++){
		if($type{$b} === "newspaper"){
			$tableBody .= "Newspaper:";
			while ($row = mysqli_fetch_array($results{$b})) {
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						$tableBody .= ' '. $row['title'];
					}
					elseif($i === 1){
						$tableBody .= ' ' . $row['newspaperTitle'];
					}
					elseif($i === 2){
						$tableBody .= ' ' . $row['newsDate'];
					}
					elseif($i === 3){
						$tableBody .= ' ' . $row['page'] . '<br>';
					}
				}
			}
		}
		elseif($type{$b} === "obit"){
			while ($row = mysqli_fetch_array($results{$b})) {
				$tableBody .= "Obituary:";
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						$tableBody .= ' '. $row['Name'];
					}
					elseif($i === 1){
						$tableBody .= ' ' . $row['newspaperTitle'];
					}
					elseif($i === 2){
						$tableBody .= ' ' . $row['Date'];
					}
					elseif($i === 3){
						$tableBody .= ' ' . $row['Page'] . '<br>';
					}
				}
			}
		}
		elseif($type{$b}=== "marriage"){
			while ($row = mysqli_fetch_array($results{$b})) {
				$tableBody .= "Marriage:";
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						$tableBody .= ' '. $row['groom'] . '<br>' . $row['bride'];
					}
					elseif($i === 1){
						$tableBody .= ' ' . $row['newspaperTitle'];
					}
					elseif($i === 2){
						$tableBody .= ' ' . $row['marriageDate'];
					}
					elseif($i === 3){
						$tableBody .= ' ' . $row['page'] . '<br>';
					}
				}
			}
		}
		elseif($type{$b} === "scrapbook"){
			while ($row = mysqli_fetch_array($results{$b})) {
				$tableBody .= "Scrapbook:";
				for($i = 0; $i <= 2; $i++){
					if($i === 0){
						$tableBody .= ' '. $row['title'];
					}
					elseif($i === 1){
						$tableBody .= ' ' . $row['scrapbookPages'];
					}
					elseif($i === 2){
						$tableBody .= ' ' . $row['event'] . '<br>';
					}
				}
			}
		}
	}
	echo $tableBody;
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
    <div class="login-clean">
        <form data-bss-recipient="13552ea7ce2e6c623533708306b17e76" data-bss-subject="Article Request">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Enter Email Here"></div>
            <div class="form-group"><textarea class="form-control form-control-lg" rows="5" name="questions" placeholder="Enter Questions or Comments Here"></textarea></div>
            <div class="form-group"><textarea class="form-control" name="tableData" readonly="" required=""><?php echo $tableBody; ?></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
    </div>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>