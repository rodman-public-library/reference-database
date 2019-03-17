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

<body>
    <?php include 'includes/header.inc.php'; ?>   
    <div class="contact-clean" style="background-color: rgb(255,255,255);">
        <form id="contact-form" style="background-color: rgb(59,119,182);color: rgb(255,255,255);" data-bss-recipient="13552ea7ce2e6c623533708306b17e76" data-bss-subject="Alliance Index Question">
            <h2 class="text-center" style="color: rgb(255,255,255);">Contact us</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" style="color: rgb(0,0,0);"></div>
            <div class="form-group"><input class="form-control is-invalid" type="email" name="email" placeholder="Email" style="color: rgb(0,0,0);"><small class="form-text text-danger" style="color: rgb(255,255,255);">Please enter a correct email address.</small></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="message" placeholder="Message" style="color: rgb(0,0,0);"></textarea></div>
            <div class="form-group"><button class="btn btn-light text-center" type="submit" id="contact-send">send </button></div>
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