<?php
session_start();
if (!isset($_SESSION['fid'])) {
    echo "Error: Farmer not logged in.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - Farmer Dashboard</h1>
        </div>
    </header>
    <div class="container">
        <h2>Welcome, Farmer!</h2>
        <a href="add_product.php">Add Product</a>
        <!-- Other farmer functionalities -->
    </div>
</body>
</html>
