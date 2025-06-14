<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_POST['submit'])) {
$id = $_POST['id'] ?? null;

    $data = [     
        'product_id' => $_POST['product_id'],
        'user_id' => $_POST['user_id'],
        'total_sold' => $_POST['total_sold'],
        'price_per_unit' => $_POST['price_per_unit'],
        'total_price' => $_POST['total_price'],
        'payment_method' => $_POST['payment_method'],
        'transaction_date' => date('Y-m-d H:i:s'),
    ];

        $queryStock = showData('stock', 'quantity', 'WHERE product_id = ' . $data['product_id']);
        $stock = $queryStock[0] ?? null;

        if (!$stock) {
            die('stock not found');
        }

        $totalSold = (int) $data['total_sold'];
        $currentStock = (int) $stock['quantity'];

        if ($data['total_sold'] > $currentStock) {
            session_start();
            $_SESSION['error'] = 'Stock tidak mencukupi';
            header('Location: ../forms/formTransaction.php');
            exit;
        }


    if ($id) {
        // update
            $query = updateData('transactions', $data, $_POST['id']);
            $message = $query['success'] ? 'Berhasil ubah data' : 'Gagal ubah produk: ' . $query['error'];
    } else {
        // insert
            $query = insertData('transactions', $data);
            $message = $query['success'] ? 'Berhasil menambahkan data' : 'Gagal menambahkan produk: ' . $query['error'];
    }

    echo 
    "<script>
        alert('$message');
        window.location.href = '../transactions.php';
    </script>";
}


?>