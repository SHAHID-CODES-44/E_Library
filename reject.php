<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM bookings WHERE id = $id";
    $conn->query($sql);
}

$conn->close();
header("Location: admin_ui.php");
exit;
?>

