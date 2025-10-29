<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$product = $_GET['product'] ?? 'Unknown Item';
$price = $_GET['price'] ?? '0.00';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout - The Bakery</title>
<style>
    body { font-family: Arial; background: #faf7f0; margin: 0; padding: 0; text-align: center; }
    .checkout-box {
        width: 400px; background: white; margin: 100px auto; padding: 20px;
        border-radius: 10px; box-shadow: 0 0 10px #ccc;
    }
    button {
        background: #b5651d; color: white; border: none; padding: 10px 20px;
        border-radius: 5px; cursor: pointer;
    }
    button:hover { background: #8a4511; }
</style>
</head>
<body>
    <div class="checkout-box">
        <h2>🧁 Checkout</h2>
        <p><strong>Product:</strong> <?= htmlspecialchars($product) ?></p>
        <p><strong>Price:</strong> $<?= htmlspecialchars($price) ?></p>
        <form method="POST" action="payment.php">
            <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">
            <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>">
            <button type="submit">Proceed to Payment</button>
        </form>
        <p><a href="index.php">← Back to Shop</a></p>
    </div>
</body>
</html>
