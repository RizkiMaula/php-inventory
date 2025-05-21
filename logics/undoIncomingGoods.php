<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_GET['id']) && isset($_GET['redirect']) && isset($_GET['table'])) {
    $id = $_GET['id'];
    $redirect = $_GET['redirect'];


    $result = deleteById('incoming_goods', ($id));
    if ($result) {
        header("Location: ../incomingGoods.php");
        exit();
    } else {
        echo "gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "invalid request";
}

// var_dump($_GET['id']);





?>