<?php
	session_start();
	echo '
		<div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: #3b77b6;">
            <div class="container"><a class="navbar-brand" href="recordCreator.php" style="color: rgb(255,255,255);">Alliance Index Record Creator</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Hello, '. $_SESSION["fnamePassing"] .'</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="editRecord.php">Edit Record</a><a class="dropdown-item" role="presentation" href="changePWD.php">Change Password</a><a class="dropdown-item" role="presentation" href="login.php">Logout</a></div>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
	';