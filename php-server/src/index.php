<?php
//echo "<h1>Welcome to the PHP Server!</h1>";
//echo "<p><a href='register.php'>Register</a> </br> <a href='login.php'>Login</a></p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the PHP Server</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the PHP Server!</h1>
    <form action="register.php" method="POST">
        <button type="submit">Register</button>
    </form> </br>
    
    <form action="login.php" method="POST">
        <button type="submit">Login</button>
    </form>
</body>
</html>

