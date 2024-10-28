<?php

session_start();

$host = 'db';
$dbname = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//I added this part for logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy(); 
    header('Location: login.php');
    exit();
}

// I added this part for login/registration
iif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$inputUsername]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($inputPassword, $user['password'])) {
        $_SESSION['username'] = $inputUsername;
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>


<form method="POST" action="">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php if (isset($_SESSION['username'])): ?>
    <p>You are logged in as <?= $_SESSION['username']; ?>.</p>
    <a href="?action=logout">Logout</a>
<?php endif; ?>