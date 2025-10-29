<?php
session_start();

// Check login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get product details from checkout
$product = isset($_GET['product']) ? $_GET['product'] : "Unknown Product";
$price = isset($_GET['price']) ? $_GET['price'] : "0.00";
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment | Online Bakery</title>
<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #fff5f2;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 400px;
        margin: 80px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;
    }
    h2 {
        color: #b5651d;
    }
    .details {
        margin: 20px 0;
        font-size: 16px;
        color: #333;
    }
    input, select {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
    }
    button {
        background-color: #ff007f;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }
    button:hover {
        background-color: #c00463;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Payment Page</h2>
    <div class="details">
        <p><b>Product:</b> <?php echo htmlspecialchars($product); ?></p>
        <p><b>Price:</b> $<?php echo htmlspecialchars($price); ?></p>
    </div>

    <form action="success.php" method="POST">
        <input type="hidden" name="product" value="<?php echo htmlspecialchars($product); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">

        <label>Payment Method:</label><br>
        <select name="method" required>
            <option value="">-- Select Payment Method --</option>
            <option value="UPI">UPI</option>
            <option value="Card">Debit/Credit Card</option>
            <option value="COD">Cash on Delivery</option>
        </select><br>

        <label>Name on Card / UPI ID:</label><br>
        <input type="text" name="name" placeholder="Enter your name or UPI ID" required><br>

        <label>Contact Number:</label><br>
        <input type="text" name="contact" placeholder="Enter your mobile number" required><br>

        <button type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
