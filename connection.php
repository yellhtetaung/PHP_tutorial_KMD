<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "Yehtetaung@2481998";
$dbname = "L5DC113";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}