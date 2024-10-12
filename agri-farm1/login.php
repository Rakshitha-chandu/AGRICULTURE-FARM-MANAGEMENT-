<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user_type == 'farmer') {
        $sql = "SELECT * FROM farmer WHERE fusername='$username' AND fpassword='$password'";
    } else if ($user_type == 'buyer') {
        $sql = "SELECT * FROM buyer WHERE busername='$username' AND bpassword='$password'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($user_type == 'farmer') {
            $_SESSION['fid'] = $row['fid'];
            header("Location: farmer_dashboard.php");
        } else if ($user_type == 'buyer') {
            $_SESSION['bid'] = $row['bid'];
            header("Location: buyer_dashboard.php");
        }
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm - Login</h1>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="login.php">
            <h2>Login</h2>
            <label for="user_type">I am a:</label>
            <select name="user_type" id="user_type" required>
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
            </select>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
