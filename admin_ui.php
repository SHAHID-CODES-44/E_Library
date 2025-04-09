<?php
$servername = "localhost";
$username = "root";
$password = ""; // If there's a MySQL password, add it here
$dbname = "library";
$port = 3307; // Make sure your MySQL is running on this port

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch bookings joined with book title
$sql = "SELECT b.id AS booking_id, b.student_rollno, b.department, b.status, b.booked_on, bk.title AS book_title
        FROM bookings b
        JOIN books bk ON b.book_id = bk.id
        ORDER BY b.id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Bookings</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .booking-card {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }
        .status-pending { color: #ffc107; font-weight: 500; }
        .status-approved { color: #28a745; font-weight: 500; }
        .status-rejected { color: #dc3545; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">📚 Admin Panel – Booking List</h2>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="booking-card">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="mb-0"><i class="fas fa-book text-primary me-2"></i><?= htmlspecialchars($row['book_title']) ?></h5>
                        <span class="status-<?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span>
                    </div>
                    <p class="mb-1"><i class="fas fa-user text-secondary me-2"></i><strong>Roll No:</strong> <?= htmlspecialchars($row['student_rollno']) ?></p>
                    <p class="mb-1"><i class="fas fa-building text-secondary me-2"></i><strong>Department:</strong> <?= htmlspecialchars($row['department']) ?></p>
                    <p class="mb-3"><i class="fas fa-calendar-alt text-secondary me-2"></i><strong>Booked On:</strong> <?= date("d M Y, h:i A", strtotime($row['booked_on'])) ?></p>

                    <div class="d-flex justify-content-end">
                        <a href="view_booking.php?id=<?= $row['booking_id'] ?>" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-eye me-1"></i> View
                        </a>
                        <a href="approve.php" class="btn btn-sm btn-outline-success me-2">
                            <i class="fas fa-check me-1"></i> Approve
                        </a>
                        <a href="reject.php?id=<?= $row['booking_id'] ?>" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-times me-1"></i> Reject
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-muted text-center">No bookings found.</p>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
