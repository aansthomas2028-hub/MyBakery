<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$usersFile = "users.json";

// Create users.json if it doesn't exist
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

// Read user data
$users = json_decode(file_get_contents($usersFile), true);
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "❌ Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - The Bakery</title>
<style>
    body { font-family: Arial; background: #faf7f0; text-align: center; margin: 0; }
    .login-box {
        background: white; padding: 30px; width: 350px; margin: 100px auto;
        border-radius: 10px; box-shadow: 0 0 10px #ccc;
    }
    h2 { color: #b5651d; }
    input { width: 90%; padding: 10px; margin: 10px; border: 1px solid #ccc; border-radius: 5px; }
    button {
        background: #b5651d; color: #fff; border: none; padding: 10px 20px;
        border-radius: 5px; cursor: pointer;
    }
    button:hover { background: #8a4511; }
    .error { color: red; }
    a { color: #b5651d; text-decoration: none; }
</style>
</head>
<body>
    <div class="login-box">
        <h2>🍰 Bakery Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <p>Don’t have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
