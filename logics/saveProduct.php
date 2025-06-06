<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_POST['submit'])) {
$id = $_POST['id'] ?? null;

    $data = [     
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'price' => $_POST['price'],
        'created_at' => date('Y-m-d H:i:s')
    ];

    if ($id) {
        // update
            $query = updateData('products', $data, $_POST['id']);
            $message = $query['success'] ? 'Berhasil ubah data' : 'Gagal ubah produk: ' . $query['error'];
    } else {
        // insert
            $query = insertData('products', $data);
            $message = $query['success'] ? 'Berhasil menambahkan data' : 'Gagal menambahkan produk: ' . $query['error'];
    }

    echo 
    "<script>
        alert('$message');
        window.location.href = '../produk.php';
    </script>";
}

?>