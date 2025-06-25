<?php

require_once 'koneksi.php';
require_once "logics/functions.php";
session_start();

$query = showDataJoin('outcoming_goods', 'products', 'outcoming_goods.product_id = products.id', '`outcoming_goods`.`product_id` AS number, `outcoming_goods`.`id` AS id, `products`.`name` AS name, `outcoming_goods`.`quantity` AS qnt, `outcoming_goods`.`date` AS date, `outcoming_goods`.`transaction_id` AS transaction, `outcoming_goods`.`reason` AS reason', 'ORDER BY `outcoming_goods`.`id` DESC');

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
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Data Outcoming Goods</h1>
        <a href="insertOutcomingGoods.php">Tambah Data Produk</a>
    <table class="table table-striped" style="padding: 10px; text-align: center">
        <thead>
            <tr style="padding: 10px;">
                <th>No</th>
                <th>Name</th>
                <th>Transaction ID</th>
                <th>Quantity</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
              <?php  foreach ($query as $row) : ?>
                    <tr style="padding: 10px;">
                        <td> <?= $i++; ?> </td>
                        <td> <?= $row['name']; ?> </td>
                        <td> <?= !empty($row['transaction']) ? $row['transaction'] : '-'; ?> </td>
                        <td> <?= $row['qnt']; ?> </td>
                        <td> <?= $row['reason']; ?> </td>
                        <td> <?= format($row['date'], 'd F Y'); ?> </td>
                        <td>
                        <?php if (empty($row['transaction'])) : ?>
                            <button class="btn btn-danger" onclick="confirmDelete('outcoming_goods', <?= $row['id']; ?>)">
                                Undo
                            </button>                                
                        <?php else : ?> 
                            <span>Delete this data <a href="transactions.php">here</a></span>
                        </td>
                        <?php endif; ?>
                    </tr>       
                <?php endforeach; ?>
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