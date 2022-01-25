<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: https://www.chess.gq/login/');
	exit;
}
$DATABASE_HOST = 'XXXXXXX';
$DATABASE_USER = 'XXXXXXX';
$DATABASE_PASS = 'XXXXXXX';
$DATABASE_NAME = 'XXXXXXX';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT username, profpic, profdesc FROM accountest WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $profpic, $profdesc);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editing Profile: <?=$_SESSION['name']?></title>
		<link href="https://www.chess.gq/login/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <!-- Favicon  -->
    <link rel="icon" href="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/chessicon.png">
    	<script src="https://static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>
	</head>
	<body class="loggedin"><div class="deco-white-circle-1"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-white-circle-2"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-white-circle.svg"></div>
  <div class="deco-blue-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-blue-circle.svg"></div>
  <div class="deco-yellow-circle"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-yellow-circle.svg"></div>
  <div class="deco-green-diamond" style="margin-top: 75px !important; margin-left: 135px !important;"><img src="https://raw.githubusercontent.com/das150/chess.gq/de97eb6a7ae49c3e905cb899f026e563d2d8bb78/decorative-green-diamond.svg"></div>
<style>.navlink:hover {background-color: #2a84af !important; border-radius: 10px !important;}
#update:hover {background-color: #4b6470 !important; border-radius: 10px !important;}
.navlinkt:hover {background-color: #b1b1b1 !important; border-radius: 10px !important;}
.uploadbutton {
  background-color: #e7e7e7;
  color: #4c4c4c;
  padding: 0.5rem;
  padding-right: 20px;
  padding-left: 20px;
  border-radius: 6px;
  cursor: pointer;
  border: none;
  transition: 0.2s;
}
.uploadbutton:hover {
  background-color: #c1c1c1 !important;
  border-radius: 10px !important;
}
	  .fsp-modal__sidebar {border-radius: 10px !important;}
	  .fst-sidebar {border-top-left-radius: 10px !important; border-bottom-left-radius: 10px !important;}
	  .fsp-modal {border-radius: 10px !important;}
	  .fsp-header {border-radius: 10px !important;}
	  .fsp-footer {border-radius: 10px !important;}
	  .fsp-source-list__item {margin-top: 10px !important;}
	  .fsp-picker__brand-container {display: none !important;}
	  .fsp-header-icon {display: none !important;}
	  .fsp-content {margin-top: -13px !important;}
	  .fsp-url-source__form {margin-top: -13px !important;}
	  .fsp-url-source__input {margin-top: -13px !important;}
	  .fsp-source-auth__wrapper {margin-top: -17px !important;}
  </style>
        <nav class="navtop" style="z-index: 999999 !important; position: fixed; left: 50%; -ms-transform: translateX(-50%); transform: translateX(-50%); width: 100%;background-color: white; padding: 25px;">
			<center>
				<a class="navlink" style="transition: 0.2s; font-weight: 600; font-size: 1.2em; color: white; padding: 5px; background-color: #286887; padding-left: 20px; padding-right: 20px; text-decoration: none; border-radius: 6px; margin-right: 10px; margin-top: 10px;" href="https://www.chess.gq/play/friend">Play friend</a><a class="navlink" style="transition: 0.2s; font-weight: 600; font-size: 1.2em; color: white; padding: 5px; background-color: #286887; padding-left: 20px; padding-right: 20px; text-decoration: none; border-radius: 6px; margin-right: 10px; margin-top: 10px;" href="https://chess.gq/profile/user/leaderboard/">Leaderboard</a><a class="navlinkt" style="transition: 0.2s; font-weight: 600; font-size: 1.2em; color: #6a6a6a; padding: 5px; background-color: #e7e7e7; padding-left: 20px; padding-right: 20px; text-decoration: none; border-radius: 6px; margin-top: 10px;" href="https://www.chess.gq/login/logout.php">Logout</a>
			</center>
		</nav>
		<div class="content" style="position: absolute; left: 50%; top: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%); margin-top: 35px;"><center>
                    <div style="border-radius: 9999995px; display: inline-block; border: 4px solid white;"><div style="border-radius: 9999995px; width: 18em !important; height: 18em !important; overflow: hidden; border: 6px solid #f7fafd;" ><img id="imgsrc" src="<?=$profpic?>" style="height: 18em !important; background-color: white; margin-left: -5px;"></img></div></div>
            <form method="post" action="update.php">
            <div class="uploadbutton" style="width: 150px; margin-top: 20px;" onclick="uploadbutton()">Upload Photo</div>
            <input type="hidden" id="coverurl" name="profpic"/>

			<br>

                <textarea type="text" name="profdesc" placeholder="About You" style="resize: none; border: 2px solid #dee0e4; padding: 15px; border-radius: 6px; width: 425px !important; height: 80px;"><?=$profdesc?></textarea><br>

                <input type="submit" id="update" value="Update" style="border-radius: 6px; z-index: 99999999; font-size: 1em; width: 425px; cursor: pointer; border: none; margin-top: 20px; font-weight: 600; color: white; background-color: #2c799f; padding: 10px; padding-left: 23px; padding-right: 23px; transition: 0.2s;">
            </form>
        </center></div>
	</body>

<script>
function uploadbutton() {
const client = filestack.init("AV9YYk8I0SmSGgT6VLcNgz");
const options = {
	accept: ["image/*"],
	maxFiles: 1, minFiles: 1,
    transformations: {
		force: true, circle: true, crop: false, rotate: true
    },
	fromSources: ["local_file_system","url","imagesearch","webcam"],
	onFileUploadFinished: file => {
            const url = client.transform(file.handle);
            console.log(url);
            document.getElementById("imgsrc").src = url;
        }
};
client.picker(options).open();
}
</script>
<script>
window.setInterval(function(){
    var imgsrc = document.getElementById("imgsrc").src;
    document.getElementById('coverurl').value = imgsrc;
}, 100);
</script>
</html>
