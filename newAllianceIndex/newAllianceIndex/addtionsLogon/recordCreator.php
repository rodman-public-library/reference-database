<?php

	session_start();
	if (is_null($_SESSION["usernamePassing"])){
		header('Location: login.php?userorpassincorect=true');
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
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Record Type</h2>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fas fa-heart icon"></i>
                        <h3 class="name">Marriages</h3>
                        <p class="description">This is the form for marriages</p><a href="marriagesAdd.php" class="learn-more">Add Record</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-id-card icon"></i>
                        <h3 class="name">Obituary</h3>
                        <p class="description"><br>This is the form for obituaries.<br></p><a href="obitAdd.php" class="learn-more"><br>Add Record<br><br><br></a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-newspaper-o icon"></i>
                        <h3 class="name">Newspapers</h3>
                        <p class="description"><br>This is the form for newspapers<br></p><a href="newspaperAdd.php" class="learn-more"><br>Add Record<br><br></a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-book icon"></i>
                        <h3 class="name">Scrapbook</h3>
                        <p class="description"><br>This is the form for scrapbook entries<br></p><a href="scrapbookAdd.php" class="learn-more"><br>Add Record<br><br></a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>