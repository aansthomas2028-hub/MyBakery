<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$method = $_POST['payment_method'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Successful</title>
    <style>
        body { font-family: Arial; background: #faf7f0; text-align: center; }
        .msg-box {
            background: white; width: 400px; margin: 100px auto; padding: 30px;
            border-radius: 10px; box-shadow: 0 0 10px #ccc;
        }
        button {
            background: #b5651d; color: white; padding: 10px 20px; border: none;
            border-radius: 5px; cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="msg-box">
        <h2>🎉 Order Confirmed!</h2>
        <p>Payment Method: <?= htmlspecialchars(ucfirst($method)) ?></p>
        <p>Thank you for shopping with <strong>The Bakery</strong> 🍰</p>
        <a href="index.php"><button>Back to Home</button></a>
    </div>
</body>
</html>
