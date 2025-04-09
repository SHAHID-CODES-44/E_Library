<?php
session_start();
include 'd_b.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = trim($_POST['roll']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE roll_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roll);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $student = $result->fetch_assoc();
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_name'] = $student['name'];
            $_SESSION['roll_no'] = $student['roll_no'];
            $_SESSION['email'] = $student['email']; // ✅ IMPORTANT LINE ADDED
            header("Location: student_ui.php");
            exit;
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Roll number not found.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 30px;
        }
        .form-container {
            max-width: 400px;
            background: white;
            margin: auto;
            padding: 25px 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 12px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #218838;
        }
        .error {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Student Login</h2>

    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Roll No:</label>
        <input type="text" name="roll" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn">Login</button>
    </form>
    <a href="Ssignup.php"><button>Create a new account</button></a>
</div>

</body>
</html>
