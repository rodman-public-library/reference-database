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
    <div class="login-clean">
        <form method="post" style="background-color: #3b77b6;" action="confirm/confirmNews.php">
            <h1 class="text-center" style="color: rgb(255,255,255);">Newspaper</h1>
            <div class="form-group"><label style="color: rgb(255,255,255);">Title (If there is is an illustration or portrait, put it here as ' il.' no quotes at the very end):</label><textarea class="form-control" name="title" required=""></textarea></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Subject:</label><input class="form-control" type="text" name="subject" required=""></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">News Date:</label><input class="form-control" type="date" name="newsDate" required=""></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Page:</label><input class="form-control" type="text" name="page" required="" placeholder="C5"></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Transcription:</label><textarea class="form-control" name="transcription"></textarea></div>
            <div class="form-group"><label style="color: rgb(255,255,255);">Summary:</label><textarea class="form-control" name="summary"></textarea></div>
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