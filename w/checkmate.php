<?php
session_start();
/* Attempt MySQL server connection. */
$link = mysqli_connect("XXXXXXX", "XXXXXXX", "XXXXXXX", "XXXXXXX");
 
if (empty($_GET)) {
    echo "ERROR";
    exit;
}

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$account = $_SESSION['id'];

// Attempt insert query execution if logged in
if(isset($_SESSION['id'])){
	$sql = "UPDATE `accountest` SET wins = wins + 1 WHERE id = '$account';";
}

    
if(mysqli_query($link, $sql)){
} else{
    echo "<div style='display: none;'>ERROR: Not able to execute $sql. " . mysqli_error($link) . "</div>";
}
 
// Close connection
mysqli_close($link);
?>
    
    <!-- Webpage Title -->
    <title>You won by checkmate!</title>

    <!-- Favicon -->
    <link rel="icon" href="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/chessicon.png">
    
    <!-- External Styles and Scripts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script>
    <script src="./chessboard/js/chessboard-0.3.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
    <link rel="stylesheet" href="./chessboard/css/chessboard-0.3.0.min.css">

  <style>
    body{
      margin: 0;
      color: #777;
      background-color: #f7fafd;
	    font: 400 1rem/1.75rem "Open Sans", sans-serif;
      overflow: hidden;
    }
    .deco-white-circle-1 {
		position: absolute;
		top: 26rem;
		left: -12rem;
		display: block;
		width: 22rem;
		height: 22rem;
	  }
	  .deco-white-circle-2 {
		position: absolute;
		top: 19rem;
		right: -12rem;
		display: block;
		width: 20rem;
		height: 20rem;
  	}
  	.deco-blue-circle {
		position: absolute;
		top: 28rem;
		left: 5rem;
		display: block;
		width: 5rem;
		height: 5rem;
  	}
	  .deco-yellow-circle {
		position: absolute;
		top: 9rem;
		right: 7rem;
		display: block;
		width: 1.5rem;
		height: 1.5rem;
	  }
	  .deco-green-diamond {
		position: absolute;
		top: 9rem;
		left: 4rem;
		display: block;
		width: 1rem;
		height: 1rem;
  	}
      .loginbutton {
  	padding: 15px;
      padding-left: 25px;
      padding-right: 25px;
  	background-color: #388bb1;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: 0.2s;
  	    border-radius: 6px;
          -webkit-appearance: none;
-webkit-border-radius: 6;
display: inline;
}
.loginbutton:hover {
	background-color: #2e6d8b;
	    border-radius: 8px;
  	transition: 0.2s;
}
#otheroption:hover {background-color: #b3b3b3 !important; border-radius: 8px !important;}
	  
  </style>
</head>

<body>
<!--#388bb1-->
<div class="deco-white-circle-1"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-white-circle-2"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-blue-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-blue-circle.svg"></div>
  <div class="deco-yellow-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-yellow-circle.svg"></div>
  <div class="deco-green-diamond" style="margin-top: 75px !important; margin-left: 135px !important;"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-green-diamond.svg"></div>

  <div class="container" style="position: absolute; left: 50%; top: 48%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
	    <center><img src="winresignation.svg" style="width: 100%; margin-bottom: 50px; margin-top: -50px;">


        <h1 style="line-height: 1.5; color: #4a4a4a; margin-bottom: 35px;"><b>You won by checkmate!</b></h1></center>
        <?php
                    session_start();

                    if (strlen($_SESSION['name']) > 0) {
                        echo '<center><a style="color: #4c4c4c;" target="_BLANK" href="https://www.chess.gq/match/analyze/?pgn='. $_GET["pgn"] .'">Analyze Match</a></center>';
                    } else {
                        echo '<center>

                        <a href="https://www.chess.gq/login/" style="padding-top: 15px !important; text-decoration: none;"><div style="" class="loginbutton">Login</div></a>
							<a href="https://www.chess.gq/sign-up/" style="text-decoration: none;"><div id="otheroption" style="background-color: #d7d7d7; text-decoration: none;
    color: #4c4c4c;
    display: inline; width: 150px;
  	padding: 15px;
  	padding-left: 18.26px;
    padding-right: 18.26px;
  	border: 0;
  	cursor: pointer;
  	transition: 0.2s;
  	    border-radius: 6px; margin-left: 5px;">Sign-Up Instead</div></a>
                        
                        </center>';
                    }
                    ?>
  </div>

</body></html>
