<?php

require_once 'koneksi.php';
require_once 'logics/functions.php';
session_start();



$data = showData('products', '*', 'ORDER BY `products`.`name` ASC');
$i = 1;

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
        <h1>Data Product</h1>
        <a href="forms/formProduct.php">Tambah Data Produk</a>
    <table class="table table-striped" border="1" style="padding: 10px; text-align: center">
        <thead>
            <tr style="padding: 10px;">
                <th>No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
            <?php foreach ($data as $row) : ?>
                    <tr style="padding: 10px;">
                        <td><?= $i++ ?> </td>
                        <td> <?= $row['name']; ?> </td>
                        <td> <?= $row['category']; ?> </td>
                        <td> <?= $row['price']; ?> </td>
                        <td> <?= format($row['created_at']); ?> </td>
                        <td>
                            <?php if ($_SESSION['role'] == 'admin') : ?>
                                <a class="btn btn-primary" href="forms/formProduct.php?id=<?= $row['id']; ?>">Edit</a> <button class="btn btn-danger" onclick="confirmDelete('products', <?= $row['id']; ?>)">Delete</button> 
                            <?php else : ?>
                                <span>Only Admin Can Take This Action</span>
                            <?php endif; ?>
                        </td>
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