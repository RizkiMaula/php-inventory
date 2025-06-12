<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: forms/formLogin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center p-5 rounded shadow">
        <div class="row">
            <a href="profile.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <i data-lucide="user"></i>
            <span>Profile</span>
            </a>
        </div>
        <div class="row">
            <a href="produk.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <i data-lucide="package"></i>
            <span>Product</span>
            </a>
            <a href="stock.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <i data-lucide="warehouse"></i>
            <span>Stock</span>
            </a>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="incomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="arrow-down-circle"></i>
                <span>Incoming Goods</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="x"></i>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="arrow-up-circle"></i>
                <span>Outcoming Goods</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="x"></i>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="transactions.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="receipt"></i>
                <span>Transaction</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <i data-lucide="x"></i>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
            <a href="logics/logout.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <i data-lucide="log-out"></i>
            <span>Logout</span>
            </a>
        </div>
    </div>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>