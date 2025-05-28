<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_POST['submit'])) {

    $data = [     
        'product_id' => $_POST['product_id'],
        'user_id' => $_POST['user_id'],
        'total_sold' => $_POST['total_sold'],
        'price_per_unit' => $_POST['price_per_unit'],
        'total_price' => $_POST['total_price'],
        'payment_method' => $_POST['payment_method'],
        'transaction_date' => date('Y-m-d H:i:s'),
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
