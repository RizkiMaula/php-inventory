<?php 
require_once 'koneksi.php';
require_once 'logics/functions.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 ">
        <div class="card" style="width: 18rem; border: 1px solid #ccc; text-align: center;">
          <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['name']; ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $_SESSION['email']; ?></h6>
            <p class="card-text"><?= $_SESSION['role']; ?></p>
          </div>
        </div>
    </div>
</body>
</html>