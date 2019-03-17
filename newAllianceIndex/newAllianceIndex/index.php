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

<body class="text-center">

     <?php include 'includes/header.inc.php'; ?>      
    
    <div class="login-clean">
        <form action="keywordResults.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h3 id="form-heading">Search The Index</h3>
            </div>
            <div class="form-group"><input class="form-control" type="search" placeholder="Enter Keyword Here" id="form-search" name="keywordSearch" style="background-color: rgb(255,255,255);"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="search-button">SEARCH</button></div>
        </form>
    </div>
    <div class="text-center" id="type-search">
        <h3 style="margin-bottom: 5%;padding-top: 5%;">Search by Type</h3>
		<a class="btn btn-primary" role="button" href="newspaperSearch.php" id="search-type-btn">Newspaper</a>
		<a class="btn btn-primary" role="button" href="obitSearch.php" id="search-type-btn">Obituaries</a>
		<a class="btn btn-primary" role="button" href="marriagesSearch.php" id="search-type-btn">Marriages</a>
		<a class="btn btn-primary" role="button" href="catholicSearch.php" id="search-type-btn">Catholic</a></div>
    <div class="visitor-count">
		<?php include "counter.php"; ?>
	</div>
	<?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>