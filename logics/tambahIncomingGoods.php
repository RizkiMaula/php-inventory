<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';


if (isset($_POST['submit'])) {

    $data = [
        
        'product_id' => $_POST['product_id'],
        'supplier' => $_POST['supplier'],
        'quantity' => $_POST['quantity'],
        'received_date' => date('Y-m-d H:i:s')
    ];

    $query = insertData('incoming_goods', $data);

    if ($query['success']) {
        # code...
        echo 
        "<script>
                 alert('Berhasil menambahkan data'); window.location.href = '../incomingGoods.php';
        </script>";
    } else {
        echo 
        "<script>
            alert('Gagal menambahkan produk: " . $result['error'] . "');
        </script>";
    }
}



?>