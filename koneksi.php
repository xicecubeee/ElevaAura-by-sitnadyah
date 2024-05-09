<?php
$host = "localhost"; // Sesuaikan dengan host database Anda
$user = "root";      // Sesuaikan dengan username database Anda
$password = "";      // Sesuaikan dengan password database Anda
$database = "elevaaura"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>