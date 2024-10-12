<?php
include 'db.php';
session_start();

if (!isset($_SESSION['fid'])) {
    echo "Error: Farmer not logged in.";
    exit;
}

$farmer_id = $_SESSION['fid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_info = $_POST['product_info'];
    $product_price = $_POST['product_price'];

    $sql = "INSERT INTO fproduct (fid, product, pcat, pinfo, price) VALUES ('$farmer_id', '$product_name', '$product_category', '$product_info', '$product_price')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - Add Product</h1>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="add_product.php">
            <h2>Add Product</h2>
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="text" name="product_category" placeholder="Product Category" required>
            <input type="text" name="product_info" placeholder="Product Information" required>
            <input type="number" name="product_price" placeholder="Product Price" required>
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
