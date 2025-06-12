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

  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card" style="width: 18rem; border: 1px solid #ccc; text-align: center;">
      <div class="card-header d-flex justify-content-center py-4">
        <i data-lucide="user"></i>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $_SESSION['name']; ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $_SESSION['email']; ?></h6>
        <p class="card-text"><?= $_SESSION['role']; ?></p>
      </div>
        <a href="logics/logout.php" class="btn btn-primary mx-3 mb-1">Logout</a>
        <a href="index.php" class="btn btn-primary mx-3 mb-1">Back</a>
    </div>
  </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>