<?php

require 'koneksi.php';

$data = "SELECT `stock`.`product_id` AS number, `products`.`name` AS name, `stock`.`quantity` AS qnt, `stock`.`last_updated` AS updated FROM `stock` INNER JOIN `products` WHERE stock.product_id = products.id";
$query = mysqli_query($koneksi, $data);

function format($date, $format) {
    return date($format, strtotime($date));
}

function number($number) {
    for ($i=0; $i < $number ; $i++) { 
        echo $i;
    }
}

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
        <?php if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr style="padding: 10px;">
                    <td> <?= $row['number']; ?> </td>
                    <td> <?= $row['name']; ?> </td>
                    <td> <?= $row['qnt']; ?> </td>
                    <td> <?= format($row['updated'], 'd F Y'); ?> </td>
                    <td> <a href="edit.php?id=<?= $row['number']; ?>">Edit</a> || <button onclick="confirmDelete('products', <?= $row['number']; ?>)">Delete</button> </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="2">No results found</td>
            </tr>
        <?php } ?>
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

    const edited = () => {
        
    }
</script>
</html>