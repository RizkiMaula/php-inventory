<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_POST['submit'])) {

    $data = [     
        'product_id' => $_POST['product_id'],
        'transaction_id' => $_POST['Transaction_id'],
        'quantity' => $_POST['quantity'],
        'reason' => $_POST['reason'],
        'date' => date('Y-m-d H:i:s'),
    ];
    $query = insertData('transactions', $data);

    if ($query['success']) {
        echo 
        "<script>
                 alert('Berhasil menambahkan data'); window.location.href = '../transactions.php';
        </script>";
    } else {
        echo 
        "<script>
            alert('Gagal menambahkan produk: " . $result['error'] . "');
        </script>";
    }
}








?>

bantu saya buat lebih reusable