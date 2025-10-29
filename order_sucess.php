<?php
session_start();
$name = $_POST['name'] ?? '';
$total = $_POST['total'] ?? 0;

// clear cart
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Success</title>
  <style>
    body { font-family: Arial; text-align: center; background: #faf7f0; }
    .msg { background: #fff; padding: 40px; border-radius: 10px; width: 400px; margin: 50px auto; box-shadow: 0 0 8px #ddd; }
    h2 { color: #b5651d; }
    a { color: #fff; background: #b5651d; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
    a:hover { background: #8a4511; }
  </style>
</head>
<body>
  <div class="msg">
    <h2>🎉 Thank You, <?php echo htmlspecialchars($name); ?>!</h2>
    <p>Your payment of <strong>$<?php echo $total; ?></strong> has been received.</p>
    <p>Your order will be delivered soon!</p>
    <a href="index.php">Back to Home</a>
  </div>
</body>
</html>
