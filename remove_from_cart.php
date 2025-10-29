<?php
session_start();
if (isset($_POST['index'])) {
    unset($_SESSION['cart'][$_POST['index']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
}
header("Location: cart.php");
exit;
?>
