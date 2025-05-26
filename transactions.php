<?php

require_once 'koneksi.php';
require_once "logics/functions.php";

$query = showDataJoin3('`products`.`name` as product_name, `users`.`name` as name, `transactions`.`total_sold` AS sold, `transactions`.`total_price` AS total, `transactions`.`payment_method`AS payment, `transactions`.`transaction_date` AS date', 'transactions', 'products', '`products`.`id` = `transactions`.`product_id`', 'users', '`users`.`id` = `transactions`.`user_id`');
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Outcoming Goods</h1>
    <a href="insertOutcomingGoods.php">Tambah Data Produk</a>
<table border="1" style="padding: 10px; text-align: center">
        <tr style="padding: 10px;">
            <th>No</th>
            <th>Product Name</th>
            <th>Name</th>
            <th>Sold</th>
            <th>Price</th>
            <th>Payment</th>
            <th>Transaction</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
          <?php  foreach ($query as $row) : ?>
                <tr style="padding: 10px;">
                    <td> <?= $i++; ?> </td>
                    <td> <?= $row['product_name']; ?> </td>
                    <td> <?= $row['name']; ?> </td>
                    <td> <?= $row['sold']; ?> </td>
                    <td> <?= $row['total']; ?> </td>
                    <td> <?= $row['payment']; ?> </td>
                    <td> <?= format($row['date'], 'd F Y'); ?> </td>
                    <td> <button onclick="confirmDelete('transactions', <?= $row['id']; ?>)">Undo</button></td>
                </tr>       
            <?php endforeach; ?>
    </table>
    <a href="index.php">ke halaman index</a>
</body>

<script>
    function confirmDelete(table, id) {
        if (confirm('are you sure you want to delete this data?')) {
            window.location.href = `logics/undoIncomingGoods.php?table=${table}&id=${id}&redirect=${encodeURIComponent(window.location.href)}`;
        }
        alert('data deleted');
    }
</script>
</html> 