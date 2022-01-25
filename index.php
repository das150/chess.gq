<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Webpage Title -->
    <title>Play Chess Online!</title>

    <!-- Favicon  -->
    <link rel="icon" href="images/chessicon.png">
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">

            <!-- Logo -->
            <a class="logo-image" href="#"><img src="images/chessicon.png" style="width: 72px !important; height: 60px; padding: 7px; margin-left: -5px;"></a> 

            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <?php
                    session_start();

                    if (strlen($_SESSION['name']) > 0) {
                        echo '<a class="nav-link" href="/login/logout.php">LOGOUT</a>';
                    } else {
                        echo '<a class="nav-link" href="sign-up">SIGN-UP</a>';
                    }
                    ?>
                    </li>
                </ul>
                <span class="nav-item">
                    <?php
                    session_start();

                    if (strlen($_SESSION['name']) > 0) {
                        echo '<a class="btn-outline-sm" href="profile">' . $_SESSION['name'] . '</a>';
                    } else {
                        echo '<a class="btn-outline-sm" href="login">LOGIN</a>';
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h1>Play Chess Online!</h1>
                        <p class="p-large p-heading">Click the button below to begin a match.</p>
                        <a class="btn-solid-lg" href="play/friend" style="padding-top: 17px !important; padding-bottom: 17px !important; padding-left: 55px; padding-right: 55px;"><i class="fas fa-user-friends"></i> &nbsp; &nbsp; VS. FRIEND</a>
                        <!--<a class="btn-solid-lg" href="play/computer" style="padding-top: 17px !important; padding-bottom: 17px !important;"><i class="fas fa-robot"></i> &nbsp; &nbsp; VS. COMPUTER</a>-->
                        <!--<a class="btn-solid-lg" href="play/four-player" style="padding-top: 17px !important; padding-bottom: 17px !important;"><i class="fas fa-dice-four"></i>&nbsp;&nbsp;FOUR-PLAYER</a>-->
                    </div>
                </div>
            </div>
                        <img class="img-fluid" src="/images/mainimage.svg" style="margin-top: -100px;">
        </div>
        <div class="deco-white-circle-1"><img src="images/decorative-white-circle.svg"></div>
        <div class="deco-white-circle-2"><img src="images/decorative-white-circle.svg"></div>
        <div class="deco-blue-circle"><img src="images/decorative-blue-circle.svg"></div>
        <div class="deco-yellow-circle"><img src="images/decorative-yellow-circle.svg"></div>
        <div class="deco-green-diamond" style="margin-top: 75px !important; margin-left: 135px !important;"><img src="images/decorative-green-diamond.svg"></div>
    </header>

    <!-- Footer -->
    <div class="footer" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col" style="width: 99% !important;">
                        <h5 style="color: #20825d;">About Chess.gq</h5>
                        <p class="p-small" style="color: #6a6a6a;">This is my MYP project for my sophomore year of high school. I created it during December 2021 and I added final touches in January 2022. Please do not crash the node.js that this site is using.</p>
                    </div>
                    <div class="footer-col">
                        <h5 style="color: #20825d;">Links</h5>
                        <ul class="list-unstyled li-space-lg p-small" style="color: #6a6a6a;">
                            <li style="color: #6a6a6a;"><a target="_BLANK" href="https://github.com/das150/chess.gq" style="color: #4e4e4e;"><u>GitHub Repository</u></a></li>
                            <li style="color: #6a6a6a;"><a target="_BLANK" href="sources" style="color: #4e4e4e;"><u>Sources</u></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
