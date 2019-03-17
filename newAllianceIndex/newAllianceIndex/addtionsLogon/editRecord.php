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
        <form action="recordSelectorEdit.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color: rgb(255,255,255);">Select Type to Edit</h1>
            </div>
            <div class="form-group"><select class="custom-select" name="tableType" id="tableType"><option value="newspaper" selected="">Newspaper</option><option value="obit">Obituaries</option><option value="marriage">Marriage</option><option value="scrapbook">Scrapbook</option></select></div>
            <input
                class="form-control" type="number" name="recordNum" placeholder="record Number Here" step="1" id="recordNum">
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(255,255,255);color: #3b77b6;">Go!</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>