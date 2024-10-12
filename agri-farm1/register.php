<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    if ($role == 'farmer') {
        $sql = "INSERT INTO farmer (fname, fusername, fpassword, femail, fmobile, faddress) 
                VALUES ('$name', '$username', '$password', '$email', '$mobile', '$address')";
    } else {
        $sql = "INSERT INTO buyer (bname, busername, bpassword, bemail, bmobile, baddress) 
                VALUES ('$name', '$username', '$password', '$email', '$mobile', '$address')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
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
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agri Farm</h1>
        </div>
    </header>
    <div class="container">
        <form method="POST" action="register.php">
            <h2>Register</h2>
            <label for="role">I am a:</label>
            <select name="role" id="role">
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
            </select>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="mobile" placeholder="Mobile" required>
            <input type="text" name="address" placeholder="Address" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
