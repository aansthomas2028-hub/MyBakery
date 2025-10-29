<?php
session_start();

if (isset($_GET['remove'])) {
  unset($_SESSION['cart'][$_GET['remove']]);
  header("Location: cart.php");
  exit;
}

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Cart</title>
  <style>
    body { font-family: Arial; background: #fff8f0; text-align: center; }
    table { margin: 20px auto; border-collapse: collapse; width: 70%; }
    th, td { padding: 10px 20px; border: 1px solid #ccc; }
    button { background: #b5651d; color: #fff; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; }
    button:hover { background: #8a4511; }
  </style>
</head>
<body>
  <h2>🛒 Your Cart</h2>
  <?php if (!empty($_SESSION['cart'])): ?>
    <table>
      <tr><th>Product</th><th>Price</th><th>Qty</th><th>Subtotal</th><th>Action</th></tr>
      <?php foreach ($_SESSION['cart'] as $id => $item): 
        // ✅ Safety check: ensure quantity key exists
        $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
        $subtotal = $item['price'] * $quantity;
        $total += $subtotal;
      ?>
        <tr>
          <td><?= htmlspecialchars($item['name']) ?></td>
          <td>$<?= $item['price'] ?></td>
          <td><?= $quantity ?></td>
          <td>$<?= $subtotal ?></td>
          <td><a href="?remove=<?= $id ?>"><button>Remove</button></a></td>
        </tr>
      <?php endforeach; ?>
      <tr><td colspan="3" align="right"><b>Total</b></td><td colspan="2"><b>$<?= $total ?></b></td></tr>
    </table>

    <form method="POST" action="checkout.php">
      <input type="hidden" name="total" value="<?= $total ?>">
      <button type="submit">Proceed to Checkout</button>
    </form>
  <?php else: ?>
    <p>Your cart is empty.</p>
  <?php endif; ?>

  <p><a href="index.php">⬅ Back to Shop</a></p>
</body>
</html>
