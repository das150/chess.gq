<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'sql112.epizy.com';
$DATABASE_USER = 'epiz_30631549';
$DATABASE_PASS = 'deuQtFaH4jwHzCH';
$DATABASE_NAME = 'epiz_30631549_chess';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit("<!DOCTYPE html>
<html>
<head>
<title>Account Authentication</title>
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
<body style='background-color: #f7fafd;'>

</body>
</html><script>alert('Please fill in both the username and password fields!')</script><script>        function codeAddress() {
            window.history.back();
        }
        window.onload = codeAddress;</script>");
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password, activation_code FROM accountest WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $code);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.

	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		$_SESSION['Bookshelf'] = $id;
		$destination = $_POST['continueto'];
        if($code == "activated") {header('Location: https://www.chess.gq/profile/'.$destination);} else {
            echo "<!DOCTYPE html>
<html>
<head>
<title>Account Authentication</title>
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
<body style='background-color: #f7fafd;'>
</body>
</html><script>alert('Please Check Your Email To Activate Your Account!')</script><script>        function codeAddress() {
            window.history.back();
        }
        window.onload = codeAddress;</script>";
	}

		
	} else {
		echo "<!DOCTYPE html>
<html>
<head>
<title>Account Authentication</title>
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
<body style='background-color: #f7fafd;'>
</body>
</html><script>alert('The Username And Password Do Not Match!')</script><script>        function codeAddress() {
            window.history.back();
        }
        window.onload = codeAddress;</script>";
	}
} else {
	echo "<!DOCTYPE html>
<html>
<head>
<title>Account Authentication</title>
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
<body style='background-color: #f7fafd;'>
</body>
</html><script>alert('The Username And Password Do Not Match!')</script><script>        function codeAddress() {
            window.history.back();
        }
        window.onload = codeAddress;</script>";
}

	$stmt->close();
}
?>