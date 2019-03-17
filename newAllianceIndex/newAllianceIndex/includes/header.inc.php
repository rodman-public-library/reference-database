<?php
	session_start();
	if(!isset($_SESSION['counter'])){
		$_SESSION['counter'] = 0;
	}
	echo'	
    <div id="nav-styles" class="noPrint">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top navigation-clean" id="nav-styles" style="background-color: #3b77b6;">
            <div class="container"><a class="navbar-brand" href="index.php" id="nav-text-color">The Alliance Index</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">Search By Type</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles"><a class="dropdown-item" role="presentation" href="marriagesSearch.php" id="nav-text-color">Marriages</a><a class="dropdown-item" role="presentation" href="obitSearch.php"
                                    id="nav-text-color">Obituaries</a><a class="dropdown-item" role="presentation" href="newspaperSearch.php" id="nav-text-color">Newspaper</a><a class="dropdown-item" role="presentation" href="scrapbookSearch.php" id="nav-text-color">Scrapbook</a>
                                <a class="dropdown-item" role="presentation" href="catholicSearch.php" id="nav-text-color">Catholic</a>
                            </div>
                        </li>
						<li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">Help</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles">
								<a class="dropdown-item" role="presentation" href="searchTips.php" id="nav-text-color">Search Tips</a>
								<a class="dropdown-item" role="presentation" href="orderArticle.php" id="nav-text-color">Order Articles</a>
								<a class="dropdown-item" role="presentation" href="aboutIndex.php" id="nav-text-color">About the Index</a>
                                <a class="dropdown-item" role="presentation" href="questionsContact.php" id="nav-text-color">Ask A Question</a>
                            </div>
                        </li>
						<li class="dropdown nav-item" style="height: 100%;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" id="nav-text-color">Local Information</a>
                            <div class="dropdown-menu dropdown-content" role="menu" id="nav-styles"><a class="dropdown-item" role="presentation" href="https://www.rodmanlibrary.com/allianceinfo/" id="nav-text-color">Alliance Info</a><a class="dropdown-item" role="presentation" href="https://www.alliancememory.org/digital/"
                                    id="nav-text-color">Alliance Memory</a>
                                <a class="dropdown-item" role="presentation" href="https://roc.rodmanlibrary.com/" id="nav-text-color">RPL Catalog</a>
								<a class="dropdown-item" role="presentation" href="http://www.ohiomemory.org/cdm/landingpage/collection/p16007coll36" id="nav-text-color">Alliance Review, <br> 1916-1920</a>
								<a class="dropdown-item" role="presentation" href="https://infoweb.newsbank.com/apps/news/user/librarycard/RodmanPublicLibrary" id="nav-text-color">Alliance Review, <br> 2002-present</a>
                            </div>
                        </li>
                        <li class="nav-item text-center" role="presentation"><a class="nav-link text-center" href="https://www.rodmanlibrary.com/" id="nav-text-color"><img src="assets/img/logo.png" alt="Rodman Libary Home Page" style="background-image: url(&quot;assets/img/logo.png&quot;);height: 58%;width: 58%;"></a></li>
						<li class="nav-item text-center" role="presentation"><a class="nav-link text-center" href="cart.php" id="nav-text-color">Cart: '. $_SESSION['counter'] .'</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
	
	';
	?>