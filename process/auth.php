<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['loggedIn'])) {
    header("Location: login.php");
    exit();
} else {
    $loggedIn = $_SESSION['loggedIn'];
    if (!$loggedIn) {
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION['username'] ?? 'Guest';
}
?>