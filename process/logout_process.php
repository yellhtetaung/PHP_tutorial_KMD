<?php
session_start();

if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
}
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']);
}
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
}

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../login.php");
exit();