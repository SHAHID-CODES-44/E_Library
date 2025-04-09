<?php
session_start();
include('d_b.php');

// Debug: Simulate session data (REMOVE THIS IN PRODUCTION)
if (!isset($_SESSION['rollno']) || !isset($_SESSION['department'])) {
    // TEMP: Set dummy session data (for testing)
    $_SESSION['rollno'] = 'BCA123';
    $_SESSION['department'] = 'BCA';
    // OR redirect to login
    // header("Location: login.php");
    // exit;
}

$student_rollno = $_SESSION['rollno'];
$department = $_SESSION['department'];

// Handle AJAX booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax']) && $_POST['ajax'] === 'book') {
    $book_id = intval($_POST['book_id']);
    $status = "Pending";
    $booked_on = date('Y-m-d H:i:s');

    // Check if already booked
    $check = $conn->prepare("SELECT id FROM bookings WHERE student_rollno = ? AND book_id = ? AND status IN ('Pending', 'Approved')");
    $check->bind_param("si", $student_rollno, $book_id);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "already_booked";
    } else {
        $stmt = $conn->prepare("INSERT INTO bookings (student_rollno, department, book_id, status, booked_on) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $student_rollno, $department, $book_id, $status, $booked_on);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }
        $stmt->close();
    }
    $check->close();
    exit;
}

// Fetch books
$sql = "SELECT * FROM books ORDER BY category, title";
$result = mysqli_query($conn, $sql);
$books_by_category = [];
while ($row = mysqli_fetch_assoc($result)) {
    $books_by_category[$row['category']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Library Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="student_ui.css">
</head>
<body>
    <header class="library-header">
        <div class="container">
            <h1><i class="fas fa-book-open"></i> Digital Library Portal</h1>
            <p>Explore, Discover, Learn</p>
        </div>
    </header>

    <main class="container library-container mt-4">
        <div id="message" class="mb-3"></div>

        <?php foreach ($books_by_category as $category => $books): ?>
            <section class="mb-4">
                <h2><?= htmlspecialchars($category) ?></h2>
                <div class="row g-4">
                    <?php foreach ($books as $book): ?>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <h5><?= htmlspecialchars($book['title']) ?></h5>
                                <p><strong>Author:</strong> <?= htmlspecialchars($book['author']) ?></p>
                                <p><strong>ISBN:</strong> <?= htmlspecialchars($book['isbn']) ?></p>
                                <p><strong>Year:</strong> <?= htmlspecialchars($book['year']) ?></p>
                                <p><strong>Copies:</strong> <?= $book['copies'] ?></p>
                                <button class="btn btn-primary book-btn" data-book-id="<?= $book['id'] ?>">Reserve</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <footer class="library-footer mt-4">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Digital Library System. All rights reserved.</p>
        </div>
    </footer>

    <script>
    document.querySelectorAll('.book-btn').forEach(button => {
        button.addEventListener('click', function () {
            const bookId = this.getAttribute('data-book-id');
            fetch('student_ui.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: `ajax=book&book_id=${bookId}`
            })
            .then(response => response.text())
            .then(data => {
                const msg = document.getElementById('message');
                if (data === 'success') {
                    msg.innerHTML = '<div class="alert alert-success">✅ Booked successfully! Wait for admin approval.</div>';
                } else if (data === 'already_booked') {
                    msg.innerHTML = '<div class="alert alert-warning">❗ You already booked this book!</div>';
                } else if (data.startsWith('error:')) {
                    msg.innerHTML = '<div class="alert alert-danger">❌ ' + data + '</div>';
                } else {
                    msg.innerHTML = '<div class="alert alert-danger">❌ Unknown error occurred.</div>';
                }
                window.scrollTo(0, 0);
            });
        });
    });
    </script>
</body>
</html>
+