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
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: #3b77b6;">
            <div class="container"><a class="navbar-brand" href="recordCreator.php" style="color: rgb(255,255,255);">Alliance Index Record Creator</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Hello, <?php echo $_SESSION["fnamePassing"]?></a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Edit Record</a><a class="dropdown-item" role="presentation" href="#">Change Password</a><a class="dropdown-item" role="presentation" href="#">Logout</a></div>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="login-clean">
        <form method="post" style="background-color: #3b77b6;">
            <h1 class="text-center" style="color: rgb(255,255,255);">Scrapbook</h1>
            <div class="form-group"><label style="color: rgb(255,255,255);">Groom:</label><input class="form-control" type="text" name="groom" placeholder="Doe, John"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Bride:</label><input class="form-control" type="text" name="bride" placeholder="Doe, Jane"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Marriage Date:</label><input class="form-control" type="date"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Page:</label><input class="form-control" type="text" name="page" placeholder="C5"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Transcription:</label><textarea class="form-control"></textarea></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Summary:</label><textarea class="form-control"></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="color: #3b77b6;background-color: rgb(255,255,255);">Submit</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>