<?php
$servername = "localhost";
$username = "root";
$password = "Apple4528@";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS loginDb;";
$conn->query($sql);

$sql = "use loginDb;";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS account (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(30) NOT NULL,
  pwd VARCHAR(50) NOT NULL,
  );";
$conn->query($sql);
