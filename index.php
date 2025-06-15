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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <span>Profile</span>
            </a>
        </div>
        <div class="row">
            <a href="produk.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-icon lucide-package"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"/><path d="M12 22V12"/><polyline points="3.29 7 12 12 20.71 7"/><path d="m7.5 4.27 9 5.15"/></svg>
            <span>Product</span>
            </a>
            <a href="stock.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-icon lucide-package"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"/><path d="M12 22V12"/><polyline points="3.29 7 12 12 20.71 7"/><path d="m7.5 4.27 9 5.15"/></svg>
            <span>Stock</span>
            </a>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="incomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-down-icon lucide-circle-arrow-down"><circle cx="12" cy="12" r="10"/><path d="M12 8v8"/><path d="m8 12 4 4 4-4"/></svg>
                <span>Incoming Goods</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-up-icon lucide-circle-arrow-up"><circle cx="12" cy="12" r="10"/><path d="m16 12-4-4-4 4"/><path d="M12 16V8"/></svg>
                <span>Outcoming Goods</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="transactions.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt-icon lucide-receipt"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17.5v-11"/></svg>
                <span>Transaction</span>
                </a>
            <?php else : ?>
                <div href="outcomingGoods.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                <span>Only Admin Can Access</span>
                </div>
            <?php endif; ?>
            <a href="logics/logout.php" class="col border border-primary text-decoration-none p-4 d-flex flex-column align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
            <span>Logout</span>
            </a>
        </div>
    </div>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>