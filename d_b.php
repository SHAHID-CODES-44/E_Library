<?php
$host = "localhost";
$username = "root";
$password = ""; // leave it blank for XAMPP default
$database = "library";
$port = 3307; // your custom MySQL port

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
