<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("XXXXXXX", "XXXXXXX", "XXXXXXX", "XXXXXXX");

if (!isset($_SESSION['loggedin'])) {
	header('Location: https://www.chess.gq/login/?destination=profile/edit.php');
	exit;
}
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$account = $_SESSION['id'];
$profdesc = mysqli_real_escape_string($link, $_POST['profdesc']);
$profimg = mysqli_real_escape_string($link, $_POST['profpic']);

// Attempt insert query execution
$sql = "UPDATE `accountest` SET profdesc='$profdesc', profpic='$profimg' WHERE id='$account';";


if(mysqli_query($link, $sql)){
    echo "<script>
window.location.hash='n';
window.location.hash='n';
window.onhashchange=function(){window.location.hash='n';}
</script><script>        function codeAddress() {
            location.replace('http://www.chess.gq/profile/')
        }
        window.onload = codeAddress;</script>";
    	header('Location: http://www.chess.gq/profile/');
    	exit;
} else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
