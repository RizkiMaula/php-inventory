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

    $query = updateData('products', $data, $_POST['id']);

        if ($query['success']) {    
            echo 
            "<script>
                     alert('Berhasil ubah data'); window.location.href = '../produk.php';
            </script>";
        } else {
            echo 
            "<script>
                alert('Gagal ubah produk: " . $result['error'] . "');
            </script>";
        }

}

?>