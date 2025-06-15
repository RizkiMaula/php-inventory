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
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
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
</body>
</html>