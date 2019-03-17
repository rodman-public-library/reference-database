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
    <!--div id="nav-styles">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top navigation-clean" id="nav-styles" style="background-color: #3b77b6;">
            <div class="container"><a class="navbar-brand" href="index.php" id="nav-text-color">The Alliance Index</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation" style="height: 100%;"><a class="nav-link" href="#" id="nav-text-color">Search Tips</a></li>
                        <li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">Search By Type</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles"><a class="dropdown-item" role="presentation" href="marriagesSearch.php" id="nav-text-color">Marriages</a><a class="dropdown-item" role="presentation" href="obitSearch.php"
                                    id="nav-text-color">Obituaries</a><a class="dropdown-item" role="presentation" href="newspaperSearch.php" id="nav-text-color">Newspaper</a><a class="dropdown-item" role="presentation" href="scrapbookSearch.php" id="nav-text-color">Scrapbook</a>
                                <a class="dropdown-item" role="presentation" href="catholicSearch.php" id="nav-text-color">Catholic</a>
                            </div>
                        </li>
						<li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">External Sites</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles"><a class="dropdown-item" role="presentation" href="https://www.rodmanlibrary.com/allianceinfo/" id="nav-text-color">Alliance Info</a><a class="dropdown-item" role="presentation" href="https://www.alliancememory.org/digital/"
                                    id="nav-text-color">Alliance Memory</a><a class="dropdown-item" role="presentation" href="questionsContact.php" id="nav-text-color">Ask A Question</a><a class="dropdown-item" role="presentation" href="#" id="nav-text-color">Order Article</a>
                                <a class="dropdown-item" role="presentation" href="https://roc.rodmanlibrary.com/" id="nav-text-color">RPL Catolog</a>
								<a class="dropdown-item" role="presentation" href="http://www.ohiomemory.org/cdm/landingpage/collection/p16007coll36" id="nav-text-color">Alliance Review, <br> 1916-1920</a>
								<a class="dropdown-item" role="presentation" href="https://infoweb.newsbank.com/apps/news/user/librarycard/RodmanPublicLibrary" id="nav-text-color">Alliance Review, <br> 2002-present</a>
                            </div>
                        </li>
                        <li class="nav-item text-center" role="presentation"><a class="nav-link text-center" href="https://www.rodmanlibrary.com/" id="nav-text-color"><img src="assets/img/logo.png" alt="Rodman Libary Home Page" style="background-image: url(&quot;assets/img/logo.png&quot;);height: 58%;width: 58%;"></a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div-->
 
     <?php include 'includes/header.inc.php'; ?>      
    
    <div class="login-clean">
        <form action="dataResults.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h3 id="form-heading">Search The Index</h3>
            </div>
            <div class="form-group"><input class="form-control" type="search" placeholder="Enter Keyword Here" id="form-search" style="background-color: rgb(255,255,255);"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="search-button">SEARCH</button></div>
        </form>
    </div>
    <div class="text-center" id="type-search">
        <h3 style="margin-bottom: 5%;padding-top: 5%;">Search by Type</h3>
		<a class="btn btn-primary" role="button" href="newspaperSearch.php" id="search-type-btn">Newspaper</a>
		<a class="btn btn-primary" role="button" href="obitSearch.php" id="search-type-btn">Obituaries</a>
		<a class="btn btn-primary" role="button" href="marriagesSearch.php" id="search-type-btn">Marriages</a>
        <a class="btn btn-primary" role="button" href="scrapbookSearch.php" id="search-type-btn">Scrapbook</a>
		<a class="btn btn-primary" role="button" href="catholicSearch.php" id="search-type-btn">Catholic</a></div>
    <?php include 'includes/footer.inc.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="assets/js/better-nav.js"></script>
    <script src="assets/js/display-hidden.js"></script>
</body>

</html>