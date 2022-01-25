<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Leaderboard</title>
		<link href="https://www.chess.gq/login/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <!-- Favicon  -->
    <link rel="icon" href="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/chessicon.png">
    <style>
    body {
        margin-left: 0px !important;
    }
    .leaderdivs:hover {
        background-color: white !important;
    }
    </style>
	</head>
	<body>
    	      <div class="deco-white-circle-1"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-white-circle-2"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-blue-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-blue-circle.svg"></div>
  <div class="deco-yellow-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-yellow-circle.svg"></div>
  <div class="deco-green-diamond" style="margin-top: 75px !important; margin-left: 135px !important;"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-green-diamond.svg"></div>

		<div class="content" style="position: absolute; left: 50%; top: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <div style="font-size: 50px; margin-bottom: 55px; font-weight: 100; color: #0d4b66;">Leaderboard</div>
            <?php
$DATABASE_HOST = 'XXXXXXXX';
$DATABASE_USER = 'XXXXXXXX';
$DATABASE_PASS = 'XXXXXXXX';
$DATABASE_NAME = 'XXXXXXXX';

// Create connection
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, profpic, wins, draws, losses, gamesplayed FROM accountest ORDER BY wins DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a style='text-decoration: none;' href='https://chess.gq/profile/user/?id=". $row["id"] ."'><div class='leaderdivs' style='transition: 0.2s; padding: 20px; width: 500px !important; border-radius: 10px; border-bottom: 1px solid #999999; display: block; margin-bottom: 35px;'><img style='width: 115px;' src='". $row["profpic"] ."'><div style='float:right; text-align: right;'><font style='font-size: 35px; color: black; font-weight: 800;'>". $row["username"]. "</font><br><font style='color: #15ab7d;'>". $row["wins"]. " wins</font><br><font style='color: #484848;'>". $row["draws"]. " draws</font><br><font style='color: #d73636;'>". $row["losses"]. " losses</font></div></div></a>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
			</div>
	</body>
</html>
