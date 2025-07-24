<?php
session_start();
include('../connection.php');

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>window.alert('Please fill in all fields!');</script>";
        echo "<script>window.location = '../login.php';</script>";
        exit();
    }

    $checkQuery = "SELECT * FROM tblUser WHERE username='$username' AND password='$password'";
    $checkResult = mysqli_query($connection, $checkQuery);
    $user = mysqli_fetch_array($checkResult);
    $checkUsername = $user['username'] ?? null;
    $checkPassword = $user['password'] ?? null;

    if (empty($checkUsername) || empty($checkPassword)) {
        echo "<script>window.alert('Invalid username or password!');</script>";
        echo "<script>window.location = '../login.php';</script>";
        exit();
    }

    if ($checkUsername == $username && $checkPassword == $password) {
        $_SESSION['id'] = $user['user_id']; // Store user ID in session
        $_SESSION['username'] = $checkUsername; // Store username in session
        $_SESSION['email'] = $user['email']; // Store email in session
        $_SESSION['loggedIn'] = true; // Set logged-in status

        echo "<script>window.alert('Login successful!');</script>";
        echo "<script>window.location = '../index.php';</script>";
    } else {
        echo "<script>window.alert('Invalid username or password!');</script>";
        echo "<script>window.location = '../login.php';</script>";
    }
}
