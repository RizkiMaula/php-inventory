<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';


if (isset($_POST['submit'])) {

    $data = [
        
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'price' => $_POST['price'],
        'created_at' => date('Y-m-d H:i:s')
    ];

    $query = insertData('products', $data);

        if ($query['success']) {
            echo 
            "<script>
                     alert('Berhasil menambahkan data'); window.location.href = '../produk.php';
            </script>";
        } else {
            echo 
            "<script>
                alert('Gagal menambahkan produk: " . $result['error'] . "');
            </script>";
        }
}





?>
