<?php
include 'db.php';
session_start();

if (!isset($_SESSION['bid'])) {
    echo "Error: Buyer not logged in.";
    exit;
}

$bid = $_SESSION['bid'];
$product_id = $_POST['product_id'];
$review_text = $_POST['review_text'];
$rating = $_POST['rating'];

$sql = "INSERT INTO reviews (bid, product_id, review_text, rating) VALUES ('$bid', '$product_id', '$review_text', '$rating')";
if ($conn->query($sql) === TRUE) {
    echo "Review added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: view_products.php");
exit();
?>
