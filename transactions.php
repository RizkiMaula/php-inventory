<?php

require_once 'koneksi.php';
require_once "logics/functions.php";
session_start();

$query = showDataJoin3('`transactions`.`id` as id ,`products`.`name` as product_name, `users`.`name` as name, `transactions`.`total_sold` AS sold, `transactions`.`total_price` AS total, `transactions`.`payment_method`AS payment, `transactions`.`price_per_unit`AS price, `transactions`.`transaction_date` AS date', 'transactions', 'products', '`products`.`id` = `transactions`.`product_id`', 'users', '`users`.`id` = `transactions`.`user_id`', 'ORDER BY `transactions`.`transaction_date` DESC');
$i = 1;

if ($_SESSION['role'] != 'admin') {
    header('Location: forbidden.php');
    exit();
}


?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="p-5">
            <h1>Data Transactions</h1>
            <a href="forms/formTransaction.php">Tambah Transaction</a>
        <table class="table table-striped" style="padding: 10px; text-align: center">
                <thead>
                    <tr style="padding: 10px;">
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Name</th>
                        <th>Sold</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>Transaction</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($query as $row) : ?>
                          <tr style="padding: 10px;">
                              <td> <?= $i++; ?> </td>
                              <td> <?= $row['product_name']; ?> </td>
                              <td> <?= $row['name']; ?> </td>
                              <td> <?= $row['sold']; ?> </td>
                              <td> <?= $row['price']; ?> </td>
                              <td> <?= $row['total']; ?> </td>
                              <td> <?= $row['payment']; ?> </td>
                              <td> <?= format($row['date'], 'd F Y'); ?> </td>
                              <td> <a class="btn btn-primary" href="forms/formTransaction.php?id=<?= $row['id']; ?>">Edit</a> <button   class="btn btn-danger" onclick="confirmDelete('transactions', <?= $row['id']; ?>)">Undo</button> </td>
                          </tr>       
                      <?php endforeach; ?>
                </tbody>
            </table>
            <a href="index.php">ke halaman index</a>
    </div>
</body>

<script>
    function confirmDelete(table, id) {
        if (confirm('are you sure you want to delete this data?')) {
            window.location.href = `logics/delete.php?table=${table}&id=${id}&redirect=${encodeURIComponent(window.location.href)}`;
        }
        alert('data deleted');
    }
</script>
</html> 