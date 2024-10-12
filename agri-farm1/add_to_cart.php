<?php
include 'db.php';
session_start();

if (!isset($_SESSION['bid'])) {
    echo "Error: Buyer not logged in.";
    exit;
}

$bid = $_SESSION['bid'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO cart (bid, product_id, quantity) VALUES ('$bid', '$product_id', '$quantity')";
if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: view_products.php");
exit();
?>
