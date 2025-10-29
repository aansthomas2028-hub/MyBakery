<?php
session_start();

$usersFile = "users.json";

// If users.json doesn’t exist, create it
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

// Load existing users
$users = json_decode(file_get_contents($usersFile), true);
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "⚠️ Please fill in all fields!";
    } elseif (isset($users[$username])) {
        $error = "⚠️ Username already exists!";
    } else {
        // Add new user
        $users[$username] = $password;
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
        $success = "✅ Signup successful! You can now <a href='login.php'>Login</a>.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signup - The Bakery</title>
<style>
    body { font-family: Arial; background: #faf7f0; text-align: center; margin: 0; }
    .signup-box {
        background: white; padding: 30px; width: 350px; margin: 100px auto;
        border-radius: 10px; box-shadow: 0 0 10px #ccc;
    }
    h2 { color: #b5651d; }
    input {
        width: 90%; padding: 10px; margin: 10px; border: 1px solid #ccc; border-radius: 5px;
    }
    button {
        background: #b5651d; color: #fff; border: none; padding: 10px 20px;
        border-radius: 5px; cursor: pointer;
    }
    button:hover { background: #8a4511; }
    .error { color: red; }
    .success { color: green; }
    a { color: #b5651d; text-decoration: none; }
</style>
</head>
<body>
    <div class="signup-box">
        <h2>🧁 Bakery Signup</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Choose Username" required><br>
            <input type="password" name="password" placeholder="Choose Password" required><br>
            <button type="submit">Sign Up</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
