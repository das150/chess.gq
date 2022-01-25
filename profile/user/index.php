<?php
$DATABASE_HOST = 'XXXXXXX';
$DATABASE_USER = 'XXXXXXX';
$DATABASE_PASS = 'XXXXXXX';
$DATABASE_NAME = 'XXXXXXX';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $con->prepare('SELECT username, profpic, profdesc, wins, draws, losses, gamesplayed, date_added FROM accountest WHERE id = ?');
    // In this case we can use the account ID to get the account info.
    $ths = mysqli_real_escape_string($con, $_GET['id']);
    $stmt->bind_param('i', $ths);
    $stmt->execute();
    $stmt->bind_result($username, $profpic1, $profdesc1, $wins1, $draws1, $losses1, $gamesplayed1, $date_added1);
    $stmt->fetch();
    $stmt->close();
} else {
    // Simple error to display if the id wasn't specified
    die ('Invalid URL');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile: <?=$username?></title>
		<link href="https://www.chess.gq/login/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <!-- Favicon  -->
    <link rel="icon" href="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/chessicon.png">
	</head>
	<body class="loggedin">
    	      <div class="deco-white-circle-1"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-white-circle-2"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-blue-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-blue-circle.svg"></div>
  <div class="deco-yellow-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-yellow-circle.svg"></div>
  <div class="deco-green-diamond" style="margin-top: 75px !important; margin-left: 135px !important;"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-green-diamond.svg"></div>
		<div class="content" style="position: absolute; left: 50%; top: 48%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); margin-top: 10px;">
			<center>
            <div style="border-radius: 9999995px; display: inline-block; border: 4px solid white;"><div style="border-radius: 9999995px; width: 18em !important; height: 18em !important; overflow: hidden; border: 6px solid #f7fafd;" ><img src="<?=$profpic1?>" style="height: 18em !important; background-color: white;    margin-left: -5px;"></img></div></div>
				<h1 style="color: #303030; font-size: 4em;"><?=$username?></h1>

                <p style="font-size: 1.5em; color: #5e5e5e; margin-top: -3px;"><?=$profdesc1?></p>
                <br>
				<table>
                    <tr>
						<th style="width: 125px; color: #15ab7d;">Wins</th>
						<th style="width: 125px; color: #484848;">Draws</th>
                        <th style="width: 125px; color: #d73636;">Losses</th>
					</tr>
                    <tr>
						<td style="text-align: center;"><?=$wins1?></td>
                        <td style="text-align: center;"><?=$draws1?></td>
                        <td style="text-align: center;"><?=$losses1?></td>
					</tr>
				</table>

                <br>
                <i style="font-size: 0.8em; color: #a7a7a7; margin-top: 10px;">Member Since <?=substr("$date_added1", 0, 10);?></i>
			</div>
	</body>
</html>
