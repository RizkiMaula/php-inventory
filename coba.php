<?php

require 'koneksi.php';

$data = "SELECT * FROM users";
$query = mysqli_query($koneksi, $data); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data User</h1>
<table border="1" style="padding: 10px">
        <tr style="padding: 10px;">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr style="padding: 10px;">
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td> <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> || <button onclick="confirmDelete('users', <?= $row['id']; ?>)">Delete</button> </td>
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
            const currentPage = window.location.href;
            window.location.href = `delete.php?table=${table}&id=${id}&redirect=${encodeURIComponent(currentPage)}`;
        }
        alert('data deleted');
    }

    const edited = () => {
        
    }
</script>
</html>