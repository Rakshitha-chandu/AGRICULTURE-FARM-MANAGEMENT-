<?php
session_start();
if (!isset($_SESSION['fid']) && !isset($_SESSION['bid'])) {
    echo "Error: User not logged in.";
    exit;
}

$user_type = isset($_SESSION['fid']) ? 'farmer' : 'buyer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - Dashboard</h1>
        </div>
    </header>
    <div class="container">
        <h2>Welcome, <?php echo ucfirst($user_type); ?>!</h2>
        <?php if ($user_type == 'farmer'): ?>
            <a href="add_product.php">Add Product</a>
        <?php else: ?>
            <a href="view_products.php">View Products</a>
        <?php endif; ?>
        <!-- Other dashboard functionalities -->
    </div>
</body>
</html>
