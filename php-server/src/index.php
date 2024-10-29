<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My PHP Web Page</title>
</head>
<body>
    <h1>Welcome to my PHP Web Application!</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<p>Hello, " . htmlspecialchars($_SESSION['username']) . "!</p>";
        echo "<a href='admin.php'>Admin Dashboard</a>";
        echo " | <a href='?action=logout'>Logout</a>";
    } else {
        echo "<p><a href='login.php'>Login</a> | <a href='register.php'>Register</a></p>";
    }
    ?>
</body>
</html>
