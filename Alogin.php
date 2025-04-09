<?php
include 'd_b.php';

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admins WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "<script>alert('Login successful'); window.location.href='admin_ui.php';</script>";
        exit;
    } else {
        $loginError = "Invalid email or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            width: 350px;
            padding: 30px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .error {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if (!empty($loginError)) echo "<p class='error'>$loginError</p>"; ?>

    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn">Login</button>
    </form>
</div>

</body>
</html>
