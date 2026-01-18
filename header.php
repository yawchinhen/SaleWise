<?php 
// session_start() ONLY called here ONCE
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaleWise</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateSale() {
            const amount = document.querySelector('input[name="amount"]')?.value;
            if (amount && parseFloat(amount) <= 0) {
                alert('Amount must be greater than 0');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<header>
    <h1><a href="index.php" style="color:white;text-decoration:none;">SaleWise</a></h1>
</header>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>  <!-- ✅ ADDED -->
        <?php if($isLoggedIn): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add_sales.php">Add Sale</a></li>
            <li><a href="view_sales.php">View Sales</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="container">
