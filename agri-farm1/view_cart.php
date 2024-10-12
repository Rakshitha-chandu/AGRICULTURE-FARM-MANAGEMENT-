<?php
include 'db.php';
session_start();

if (!isset($_SESSION['bid'])) {
    echo "Error: Buyer not logged in.";
    exit;
}

$bid = $_SESSION['bid'];
$sql = "SELECT cart.cart_id, fproduct.product, fproduct.pcat, fproduct.pinfo, fproduct.price, cart.quantity 
        FROM cart 
        JOIN fproduct ON cart.product_id = fproduct.pid 
        WHERE cart.bid = '$bid'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - View Cart</h1>
        </div>
    </header>
    <div class="container">
        <h2>Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Info</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['product']; ?></td>
                            <td><?php echo $row['pcat']; ?></td>
                            <td><?php echo $row['pinfo']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price'] * $row['quantity']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Your cart is empty</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a class="button" href="checkout.php">Checkout</a>
    </div>
</body>
</html>
