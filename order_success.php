<?php
session_start();
$total = $_POST['total'] ?? 0;
$name = $_POST['name'] ?? '';
$_SESSION['cart'] = []; // clear the cart
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Successful</title>
  <style>
    body { font-family: Arial; text-align: center; background: #f8fff8; }
    .box { background: #fff; border-radius: 10px; padding: 30px; margin: 50px auto; width: 400px; box-shadow: 0 0 10px #ddd; }
  </style>
</head>
<body>
  <div class="box">
    <h2>🎉 Thank You, <?= htmlspecialchars($name) ?>!</h2>
    <p>Your order of <b>$<?= number_format($total, 2) ?></b> has been placed successfully.</p>
    <a href="index.php">Back to Home</a>
  </div>
</body>
</html>
