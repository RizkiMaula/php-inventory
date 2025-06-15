<?php

require_once 'koneksi.php';
require_once "logics/functions.php";
session_start();

$query = showDataJoin('incoming_goods', 'products', 'incoming_goods.product_id = products.id', '`incoming_goods`.`product_id` AS number, `incoming_goods`.`id` AS id, `products`.`name` AS name, `incoming_goods`.`quantity` AS qnt, `incoming_goods`.`supplier` AS supplier, `incoming_goods`.`received_date` AS date');
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
    <div class="p-5">
        <h1>Data Incoming Goods</h1>
        <a href="insertIncomingGoods.php">Tambah Data Produk</a>
    <table class="table table-striped" style="padding: 10px; text-align: center">
            <thead>
                <tr style="padding: 10px;">
                    <th>No</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($query as $row) : ?>
                      <tr style="padding: 10px;">
                          <td> <?= $i++; ?> </td>
                          <td> <?= $row['name']; ?> </td>
                          <td> <?= $row['supplier']; ?> </td>
                          <td> <?= $row['qnt']; ?> </td>
                          <td> <?= format($row['date'], 'd F Y'); ?> </td>
                          <td> <button class="btn btn-danger" onclick="confirmDelete('incoming_goods', <?= $row['id']; ?>)">Undo</button> </td>
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