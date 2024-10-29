<?php
// db.php should be included here
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $error = '';

    // Validate input
    if (empty($username) || empty($password)) {
        $error = 'Username and password are required.';
    }

    // If no error, proceed with registration
    if (empty($error)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an SQL statement
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";

        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo $error;
    }
}

// Close the database connection only if it is open
if ($conn) {
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Register</button>
    </form></br>

    <form action="index.php" method="POST">
        <button type="submit">Back</button>
    </form>
    
</body>
</html>
