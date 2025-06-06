<?php

require_once 'koneksi.php';
require_once "logics/functions.php";

$query = showDataJoin('stock', 'products', 'stock.product_id = products.id', '`stock`.`product_id` AS number, `products`.`name` AS name, `stock`.`quantity` AS qnt, `stock`.`last_updated` AS updated');
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Stock</h1>
<table border="1" style="padding: 10px; text-align: center">
        <tr style="padding: 10px;">
            <th>No</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Last Updated</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
          <?php  foreach ($query as $row) : ?>
                <tr style="padding: 10px;">
                    <td> <?= $i++; ?> </td>
                    <td> <?= $row['name']; ?> </td>
                    <td> <?= $row['qnt']; ?> </td>
                    <td> <?= format($row['updated'], 'd F Y'); ?> </td>
                    <td> <a href="editStock.php?id=<?= $row['number']; ?>">Edit</a> || <button onclick="confirmDelete('products', <?= $row['number']; ?>)">Delete</button> </td>
                </tr>       
            <?php endforeach; ?>
    </table>
    <a href="index.php">ke halaman index</a>
</body>

<script>
    function confirmDelete(table, id) {
        if (confirm('are you sure you want to delete this data?')) {
            window.location.href = `delete.php?table=${table}&id=${id}&redirect=${encodeURIComponent(window.location.href)}`;
        }
        alert('data deleted');
    }

</script>
</html>