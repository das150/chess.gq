<?php
// Change this to your connection info.
$DATABASE_HOST = 'XXXXXXX';
$DATABASE_USER = 'XXXXXXX';
$DATABASE_PASS = 'XXXXXXX';
$DATABASE_NAME = 'XXXXXXX';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// First we check if the email and code exists...
if (isset($_GET['email'], $_GET['code'])) {
	if ($stmt = $con->prepare('SELECT * FROM accountest WHERE email = ? AND activation_code = ?')) {
		$stmt->bind_param('ss', $_GET['email'], $_GET['code']);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Account exists with the requested email and code.
			if ($stmt = $con->prepare('UPDATE accountest SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
				// Set the new activation code to 'activated', this is how we can check if the user has activated their account.
				$newcode = 'activated';
				$stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
				$stmt->execute();
				echo "<!DOCTYPE html>
<html>
<head>
<title>Account Activation</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
.alert {
  padding: 20px;
  background-color: #0072f5;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body style='background-color:  #f7fafd;' 

</body>
</html>
<script>alert('Your account has been activated successfully!')</script><script>        function codeAddress() {
            window.location.replace('https://www.chess.gq/login/')
        }
        window.onload = codeAddress;</script>
";
			}
		} else {
			echo "<!DOCTYPE html>
<html>
<head>
<title>Account Activation</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
.alert {
  padding: 20px;
  background-color: #0072f5;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body style='background-color:  #f7fafd;' >

</body>
</html><script>alert('That account has already been activated or doesn't exist!')</script><script>        function codeAddress() {
            window.location.replace('https://www.chess.gq/login/')
        }
        window.onload = codeAddress;</script>";
		}
	}
}
?>
