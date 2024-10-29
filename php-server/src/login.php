<?php
session_start();
require 'config.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        // Check if the username exists in the database
        if ($stmt->num_rows > 0) {
            // Bind the result to variables
            $stmt->bind_result($stored_password, $role);
            $stmt->fetch();

            // Check password: skip hashing for admin_username
            if ($username === 'admin_username' ) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                password_verify($password, $stored_password);
                redirect('admin.php');
            } elseif (password_verify($password, $stored_password)) {
                // Normal user login with hashed password
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                redirect('dashboard.php');
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that username.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Username and password are required.";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
    
    <form action="index.php" method="POST">
        <button type="submit">Back</button>
    </form>
</body>
</html>
