<?php

include("../connection.php");

if (isset($_POST['btnRegister'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM tblUser WHERE username='$username' OR email='$email'";
    $checkResult = mysqli_query($connection, $checkQuery);
    $users = mysqli_fetch_array($checkResult);
    $checkUsername = $users['username'] ?? null;
    $checkEmail = $users['email'] ?? null;

    if ($checkUsername == $username) {
        echo "<script>window.alert('Username already exist!');</script>";
        echo "<script>window.location = '../register.php';</script>";
    } else if ($checkEmail == $email) {
        echo "<script>window.alert('Email already exist!');</script>";
        echo "<script>window.location = '../register.php';</script>";
    } else {
        $regQuery = "INSERT INTO tblUser (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($connection, $regQuery);

        if ($result) {
            echo "<script>window.alert('Register successfully!');</script>";
            echo "<script>window.location = '../login.php'</script>";
        } else {
            echo "<script>window.alert('Register fail!');</script>";
            echo "<script>window.location = '../register.php'</script>";
        }
    }
}
