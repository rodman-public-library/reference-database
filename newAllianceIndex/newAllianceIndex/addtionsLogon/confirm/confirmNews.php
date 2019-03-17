<?php

	session_start();
	if (is_null($_SESSION["usernamePassing"])){
		header('Location: login.php?userorpassincorect=true');
	}
	$title = $_POST['title'];
	$subject = $_POST['subject'];
	$date = $_POST['newsDate'];
	$page = $_POST['page'];
	$transcription = $_POST['transcription'];
	$summary = $_POST['summary'];
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alliance Index</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/better-nav.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">CONFIRM</h2>
                <p class="text-center">This page is to confirm data.</p>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Title</h3>
                        <p class="description"><?php echo $title; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Date</h3>
                        <p class="description"><?php echo $date; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Page</h3>
                        <p class="description"><?php echo $page; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Transcription</h3>
                        <p class="description"><?php echo $transcription; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Summary</h3>
                        <p class="description"><?php echo $summary; ?></p>
                    </div>
                </div>
				<div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Subject</h3>
                        <p class="description"><?php echo $subject; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Confirm</h3>
						<form method="POST" action="confirmedNews.php">
							<input type="text" id="name" name="title" value="<?php echo $title; ?>" style="display: none;">
							<input type="text" id="title" name="subject" value="<?php echo $subject; ?>" style="display: none;">
							<input type="text" id="date" name="newsDate" value="<?php echo $date; ?>" style="display: none;">
							<input type="text" id="page" name="page" value="<?php echo $page; ?>" style="display: none;">
							<input type="text" id="transcription" name="transcription" value="<?php echo $transcription; ?>" style="display: none;">
							<input type="text" id="summary" name="summary" value="<?php echo $summary; ?>" style="display: none;">							
							<button class="btn btn-primary" type="submit">Confirm and Submit</button>

						</form>
					</div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Edit</h3><button class="btn btn-primary" type="button" onClick="javascript:history.go(-1)">Edit Record</button></div>
                </div>
            </div>
			
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/smart-forms.min.js"></script>
    <script src="../assets/js/better-nav.js"></script>
    <script src="../assets/js/display-hidden.js"></script>
</body>

</html>