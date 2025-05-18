<?php

require_once 'koneksi.php';
require_once 'logics/functions.php';

$data = showData('products');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Product</h1>
    <a href="insert.php">Tambah Data Produk</a>
<table border="1" style="padding: 10px; text-align: center">
        <tr style="padding: 10px;">
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($data as $row) : ?>
                <tr style="padding: 10px;">
                    <td><?= $i++ ?> </td>
                    <td> <?= $row['name']; ?> </td>
                    <td> <?= $row['category']; ?> </td>
                    <td> <?= $row['price']; ?> </td>
                    <td> <?= format($row['created_at']); ?> </td>
                    <td> <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> || <button onclick="confirmDelete('products', <?= $row['id']; ?>)">Delete</button> </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <a href="index.php">ke halaman index</a>
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