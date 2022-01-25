<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

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
// Now we check if the data was submitted, isset() function will check if the data exists.

echo '<title>Account Creation</title>';

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit("<script>alert('Please complete the sign up form.')</script><script>        function codeAddress() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress;</script>");
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit("<script>alert('Please complete the sign up form.')</script><script>        function codeAddress2() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress2;</script>");
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit("<script>
alert('The email entered is not valid, please try again.');
</script>
<script>        function codeAddress3() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress3;</script>");
}
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit("<script>
alert('The username entered is not valid, please try again.');
</script><script>        function codeAddress4() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress4;</script>");
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit("<script>
alert('Passwords must be 5 - 20 characters long, please try again!');
</script><script>        function codeAddress5() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress5;</script>");
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accountest WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo "<script>
alert('That username already exists, please try another.');
</script><script>        function codeAddress6() {
            window.location.replace('https://www.chess.gq/sign-up/')
        }
        window.onload = codeAddress6;</script>";
	} else {
		// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO accountest (username, password, email, activation_code, profpic) VALUES (?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$uniqid = uniqid();
function rand_color() {
    return '' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}
$randcolo = rand_color();
$user = $_POST['username'];
$def = "https://ui-avatars.com/api/?color=ffffff&name=" . $user . "&background=" . $randcolo . "&size=500&font-size=0.6&length=1&bold=true&format=svg";

  // Not protected from SQL injection!!!
$stmt->bind_param('sssss', $_POST['username'], $password, $_POST['email'], $uniqid, $def);
	$stmt->execute();

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = CONTACTFORM_SMTP_HOSTNAME;
    $mail->SMTPAuth = true;
    $mail->Username = CONTACTFORM_SMTP_USERNAME;
    $mail->Password = CONTACTFORM_SMTP_PASSWORD;
    $mail->SMTPSecure = CONTACTFORM_SMTP_ENCRYPTION;
    $mail->Port = CONTACTFORM_SMTP_PORT;

    // Recipients
    $mail->setFrom(CONTACTFORM_FROM_ADDRESS, 'Chess.gq');
    $mail->addAddress($_POST['email'], 'New Chess.gq User');

    // Content
    $mail->Subject = '[Chess.gq] Account Activation Required';
    $activate_link = 'https://www.chess.gq/login/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
    $mail->Body    = <<<EOT
Welcome to chess.gq, {$_POST['username']}! If you did not sign up for an account, please ignore this email. If you did, please click the following link to activate your account: $activate_link
EOT;

    $mail->send();

echo "
<script>
alert('Thank you for signing up! Please check your email to activate your account.');
</script><script>        function codeAddress7() {
            window.location.replace('https://www.chess.gq/login/')
        }
        window.onload = codeAddress7;</script>";

    redirectSuccess();
} catch (Exception $e) {
    redirectWithError("An error occurred while trying to create your activation code: ".$mail->ErrorInfo);
}

} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
