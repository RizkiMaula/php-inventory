<?php
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_GET['table']) && isset($_GET['id']) && isset($_GET['redirect'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $redirect = $_GET['redirect'];

    // validate allowed tables 
    $allowedTable = ['users', 'incoming_goods', 'outcoming_goods', 'products', 'stock', 'transactions', 'transactions_details'];

    if (!in_array($table, $allowedTable)) {
        die('invalid request'); //prevent sql injection
    }

    // delete data
    $result = deleteById($table, $id);

    if ($result) {
        header("Location: $redirect");
        exit();
    } else {
        echo "gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    echo "invalid request";
}
?>;