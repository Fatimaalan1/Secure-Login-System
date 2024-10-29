<?php
// logged-users.php
require 'config.php';

if (!isset($_SESSION['username'])) {
    redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome in</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
</body>
</html>
