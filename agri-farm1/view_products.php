<?php
include 'db.php';
session_start();

if (!isset($_SESSION['bid'])) {
    echo "Error: Buyer not logged in.";
    exit;
}

$sql = "SELECT * FROM fproduct";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - View Products</h1>
        </div>
    </header>
    <div class="container">
        <h2>Available Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Info</th>
                    <th>Price</th>
                    <th>Add to Cart</th>
                    <th>Review</th>
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
                            <td>
                                <form method="POST" action="add_to_cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $row['pid']; ?>">
                                    <input type="number" name="quantity" value="1" min="1" required>
                                    <button type="submit">Add to Cart</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="add_review.php">
                                    <input type="hidden" name="product_id" value="<?php echo $row['pid']; ?>">
                                    <textarea name="review_text" placeholder="Write a review" required></textarea>
                                    <input type="number" name="rating" value="5" min="1" max="5" required>
                                    <button type="submit">Submit Review</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No products available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
