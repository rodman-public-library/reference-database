<?php
	session_start();
	session_unset();
	session_destroy();

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
    <div id="nav-styles">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top navigation-clean" id="nav-styles" style="background-color: #3b77b6;">
            <div class="container"><a class="navbar-brand" href="login.php" id="nav-text-color">The Alliance Index</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation" style="height: 100%;"><a class="nav-link" href="#" id="nav-text-color">Search Tips</a></li>
                        <li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">External Sites</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles"><a class="dropdown-item" role="presentation" href="https://www.rodmanlibrary.com/allianceinfo/" id="nav-text-color">Alliance Info</a><a class="dropdown-item" role="presentation" href="https://www.alliancememory.org/digital/"
                                    id="nav-text-color">Alliance Memory</a><a class="dropdown-item" role="presentation" href="questionsContact.html" id="nav-text-color">Ask A Question</a><a class="dropdown-item" role="presentation" href="#" id="nav-text-color">Order Article</a>
                                <a
                                    class="dropdown-item" role="presentation" href="https://roc.rodmanlibrary.com/" id="nav-text-color">RPL Catolog</a>
                            </div>
                        </li>
                        <li class="nav-item text-center" role="presentation"><a class="nav-link text-center" href="https://www.rodmanlibrary.com/" id="nav-text-color"><img src="assets/img/logo.png" alt="Rodman Libary Home Page" style="background-image: url(&quot;assets/img/logo.png&quot;);height: 58%;width: 58%;"></a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="login-dark">
        <form method="post" action="loginConfirm.php" method="POST">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item text">
                        <h3>Rodman Public Library</h3>
                        <p class="text-left">This page was produced and owned by Rodman Public Library. Any and all information on this page is the property of Rodman Library. This page was desiged with Bootstrap Studio the Technical Processing staff at Rodman Library.</p>
                    </div>
                    <div class="col-md-6 item text">
                        <p class="text-right"><br><strong>Rodman Public Library</strong><br><strong>215 East Broadway Street</strong><br><strong>Alliance, OH 44601</strong><br><strong>330-821-2665</strong><br>
                            <a
                                href="http://www.rodmanlibrary.com/"><strong>www.rodmanlibrary.com</strong></a><br><br></p>
                    </div>
                </div>
                <p class="copyright">Rodman Public Library © 2019</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>