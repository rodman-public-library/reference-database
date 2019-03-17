<?php

	session_start();
	if (is_null($_SESSION["usernamePassing"])){
		header('Location: login.php?userorpassincorect=true');
	}
	$item1 = $_POST['label1'];
	$item2 = $_POST['label2'];
	$item3 = $_POST['label3'];
	$item4 = $_POST['label4'];
	$item5 = $_POST['label5'];
	$item6 = $_POST['label6'];
	$item7 = $_POST['label7'];
	$item8 = $_POST['label8'];
	$item9 = $_POST['label9'];
	if (is_null($item6)){
		$item6 = "";
	}
	if (is_null($item7)){
		$item7 = "";
	}
	if (is_null($item8)){
		$item8 = "";
	}
	if (is_null($item9)){
		$item9 = "";
	}
		
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
                        <h3 class="name"><?php echo $_SESSION['label1']; ?></h3>
                        <p class="description"><?php echo $item1; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label2']; ?></h3>
                        <p class="description"><?php echo $item2; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label3']; ?></h3>
                        <p class="description"><?php echo $item3; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label4']; ?></h3>
                        <p class="description"><?php echo $item4; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label5']; ?></h3>
                        <p class="description"><?php echo $item5; ?></p>
                    </div>
                </div>
				<div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label6']; ?></h3>
                        <p class="description"><?php echo $item6; ?></p>
                    </div>
                </div>
				<div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label7']; ?></h3>
                        <p class="description"><?php echo $item7; ?></p>
                    </div>
                </div>
				<div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label8']; ?></h3>
                        <p class="description"><?php echo $item8; ?></p>
                    </div>
                </div>
				<div class="col-sm-6 col-md-5 col-lg-4 item" <?php if(is_null($_SESSION['label9'])){ echo 'style="display: none;"'; } ?>>
                    <div class="box">
                        <h3 class="name"><?php echo $_SESSION['label9']; ?></h3>
                        <p class="description"><?php echo $item9; ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <h3 class="name">Confirm</h3>
						<form method="POST" action="confirmedEdit.php">
							<input type="text" id="<?php echo $_SESSION['label1']; ?>" name="label1" value="<?php echo $item1; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label2']; ?>" name="label2" value="<?php echo $item2; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label3']; ?>" name="label3" value="<?php echo $item3; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label4']; ?>" name="label4" value="<?php echo $item4; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label5']; ?>" name="label5" value="<?php echo $item5; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label6']; ?>" name="label6" value="<?php echo $item6; ?>" style="display: none;">	
							<input type="text" id="<?php echo $_SESSION['label7']; ?>" name="label7" value="<?php echo $item7; ?>" style="display: none;">
							<input type="text" id="<?php echo $_SESSION['label8']; ?>" name="label8" value="<?php echo $item8; ?>" style="display: none;">
							<?php if(!is_null($item9)){echo '<input type="text" id="'.$_SESSION['label9'].'" name="label9" value="'.$item9.'" style="display: none;">';}?>
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