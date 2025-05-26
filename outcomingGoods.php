<?php

require_once 'koneksi.php';
require_once "logics/functions.php";

$query = showDataJoin('outcoming_goods', 'products', 'outcoming_goods.product_id = products.id', '`outcoming_goods`.`product_id` AS number, `outcoming_goods`.`id` AS id, `products`.`name` AS name, `outcoming_goods`.`quantity` AS qnt, `outcoming_goods`.`date` AS date, `outcoming_goods`.`transaction_id` AS transaction, `outcoming_goods`.`reason` AS reason');
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
            <th>Name</th>
            <th>Transaction ID</th>
            <th>Quantity</th>
            <th>Reason</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
          <?php  foreach ($query as $row) : ?>
                <tr style="padding: 10px;">
                    <td> <?= $i++; ?> </td>
                    <td> <?= $row['name']; ?> </td>
                    <td> <?= !empty($row['transaction']) ? $row['transaction'] : '-'; ?> </td>
                    <td> <?= $row['qnt']; ?> </td>
                    <td> <?= $row['reason']; ?> </td>
                    <td> <?= format($row['date'], 'd F Y'); ?> </td>
                    <td> <button onclick="confirmDelete('outcoming_goods', <?= $row['id']; ?>)">Undo</button> </td>
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