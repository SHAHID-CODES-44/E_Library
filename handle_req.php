<?php
include('d_b.php');

if (isset($_POST['booking_id'], $_POST['action'])) {
    $booking_id = $_POST['booking_id'];
    $action = $_POST['action'];

    if ($action === 'accept') {
        $status = 'Approved';
    } elseif ($action === 'reject') {
        $status = 'Rejected';
    } else {
        die("Invalid action.");
    }

    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $booking_id);

    if ($stmt->execute()) {
        header("Location: admin_ui.php");
    } else {
        echo "Error updating booking.";
    }
} else {
    echo "Invalid request.";
}
?>
