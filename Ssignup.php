<?php
include 'd_b.php';

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $department = $_POST['department'];
    $roll = trim($_POST['roll']);
    $password_raw = $_POST['password'];

    if (!empty($name) && !empty($department) && !empty($roll) && !empty($password_raw)) {
        $password = password_hash($password_raw, PASSWORD_DEFAULT);

        $sql = "INSERT INTO students (name, department, roll_no, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $name, $department, $roll, $password);
            if ($stmt->execute()) {
                // Redirect to student_ui.php on success
                header("Location: student_ui.php");
                exit();
            } else {
                $error = "Failed to register. Roll No may already exist.";
            }
            $stmt->close();
        } else {
            $error = "Database error: " . $conn->error;
        }
    } else {
        $error = "Please fill all the fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }
        .form-container {
            max-width: 400px;
            background: white;
            margin: auto;
            padding: 20px 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 12px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            color: green;
        }
        .error {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Student Signup</h2>

    <?php if ($success): ?>
        <p class="message"><?= $success ?></p>
    <?php elseif ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Department:</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <option value="BCA">BCA</option>
            <option value="BBA">BBA</option>
            <option value="BCOM">BCOM</option>
        </select>

        <label>Roll No:</label>
        <input type="text" name="roll" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn">Sign Up</button>
    </form>
    <a href="Slogin.php"><button>Login</button></a>
</div>

</body>
</html>
