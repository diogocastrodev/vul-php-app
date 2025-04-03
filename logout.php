<?php
session_start();
if (isset($_SESSION['username'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}
header('Location: index.php');
exit();
