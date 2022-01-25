<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: https://www.chess.gq/login/');
?>