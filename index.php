<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Bakery</title>
<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #faf7f0;
        margin: 0;
        padding: 0;
        text-align: center;
    }
    header {
        background-color: #b5651d;
        color: white;
        padding: 15px;
    }
    header h1 {
        margin: 0;
    }
    .logout-btn {
        position: absolute;
        top: 20px;
        right: 30px;
        background: #fff;
        color: #b5651d;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
    .logout-btn:hover {
        background-color: #8a4511;
        color: #fff;
    }
    .products {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin: 40px;
        gap: 25px;
    }
    .product {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 20px;
        width: 250px;
        text-align: center;
        transition: transform 0.2s ease-in-out;
    }
    .product:hover {
        transform: scale(1.05);
    }
    .product img {
        width: 200px;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
    }
    .product h3 {
        margin-top: 10px;
        font-size: 18px;
        color: #333;
    }
    .product p {
        color: #444;
        margin: 8px 0;
    }
    .buy-btn {
        background-color: #ff007f;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
    .buy-btn:hover {
        background-color: #c00463;
    }
</style>
</head>
<body>
<header>
    <h1> Welcome to The Bakery, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
</header>

<div class="products">
    <div class="product">
        <img src="bread.png" alt="Chocolate Cake">
        <h3>SPECIAL BREAD</h3>
        <p>$25.00</p>
        <form method="GET" action="checkout.php">
            <input type="hidden" name="product" value="Decadent Chocolate Cake">
            <input type="hidden" name="price" value="25.00">
            <button type="submit" class="buy-btn">Buy Now</button>
        </form>
    </div>

    <div class="product">
        <img src="cake.png" alt="Vanilla Cupcake">
        <h3>VANILA CAKE</h3>
        <p>$10.00</p>
        <form method="GET" action="checkout.php">
            <input type="hidden" name="product" value="Vanilla Cupcake">
            <input type="hidden" name="price" value="10.00">
            <button type="submit" class="buy-btn">Buy Now</button>
        </form>
    </div>

    <div class="product">
        <img src="cookies.png" alt="Red Velvet Slice">
        <h3>CHOCOLATE COOKIES</h3>
        <p>$15.00</p>
        <form method="GET" action="checkout.php">
            <input type="hidden" name="product" value="Red Velvet Slice">
            <input type="hidden" name="price" value="15.00">
            <button type="submit" class="buy-btn">Buy Now</button>
        </form>
    </div>
</div>
</body>
</html>
