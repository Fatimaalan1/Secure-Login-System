<?php
// login.php
require 'config.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

<<<<<<< HEAD
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy(); 
    header('Location: login.php');
    exit();
}
=======
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
>>>>>>> 880195d (changes)

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

<<<<<<< HEAD
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$inputUsername]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $inputPassword) {
        $_SESSION['username'] = $inputUsername;
        $_SESSION['role'] = $user['role'];
        //header("Location: index.php");
        if ($user['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
        exit();
=======
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            redirect('dashboard.php');
        } else {
            echo "Invalid password.";
        }
>>>>>>> 880195d (changes)
    } else {
        echo "No user found with that username.";
    }
    $stmt->close();
}

$conn->close();
?>

<<<<<<< HEAD
<form method="POST" action="">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php if (isset($_SESSION['username'])): ?>
    <p>You are logged in as <?= $_SESSION['username']; ?>.</p>
    <a href="?action=logout">Logout</a>
<?php endif; ?>
=======
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
</body>
</html>
>>>>>>> 880195d (changes)
