<?php
include 'd_b.php';

$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = trim($_POST['roll']);
    $issue = trim($_POST['issue']);

    if (!empty($roll) && !empty($issue)) {
        $stmt = $conn->prepare("INSERT INTO reports (roll_no, issue_description, submitted_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $roll, $issue);

        if ($stmt->execute()) {
            $success = "Issue reported successfully!";
        } else {
            $error = "Error submitting issue.";
        }

        $stmt->close();
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report an Issue</title>
    <link rel="stylesheet" href="report.css">
</head>
<body>

<div class="report-container">
    <h2>Report an Issue</h2>

    <?php if ($success): ?>
        <p class="success-msg"><?= $success ?></p>
    <?php elseif ($error): ?>
        <p class="error-msg"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="roll">Roll No:</label>
        <input type="text" id="roll" name="roll" required>

        <label for="issue">Issue Description:</label>
        <textarea id="issue" name="issue" rows="5" required></textarea>

        <button type="submit">Submit Report</button>
    </form>
</div>

</body>
</html>
