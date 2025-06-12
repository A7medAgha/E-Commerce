<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Store session data before destroying
$session_data = $_SESSION;

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Clear session data from memory
unset($session_data);

// Redirect to login page
header("Location: login.php");
exit();
