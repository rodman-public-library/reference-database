<?php
	unset($_SESSION['inNavN']);
	unset($_SESSION['inNavO']);
	unset($_SESSION['inNavM']);
	unset($_SESSION['inNavS']);
	unset($_SESSION['inNavC']);
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
    <div class="login-clean">
        <form action="newspaperResults.php" method="GET">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h3 id="form-heading">Search The Newspapers</h3>
            </div>
            <div class="form-group"><input class="form-control" type="search" name="keywordSearch" placeholder="Enter Keyword Here" id="form-search" style="background-color: rgb(255,255,255);"></div>
            <p class="text-center" style="color: rgb(255,255,255);">---- OR ---- <br> If you know the date enter it. If you only know the Year, enter 01/01/YEAR where YEAR is the known year.</p>
            <input class="form-control" type="date" name="dateSearch" id="dateTime" viewMode="year">
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="search-button" name="submitButton" value="submit">SEARCH</button></div>
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