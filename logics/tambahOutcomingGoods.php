<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

    if (isset($_POST['submit'])) {

        $data = [
            'product_id' => $_POST['product_id'],
            'quantity' => $_POST['quantity'],
            'reason' => $_POST['reason'],
            'date' => date('Y-m-d H:i:s'),
        ];

        $queryStock = showData('stock', 'quantity', 'WHERE product_id = ' . $data['product_id']);
        $stock = $queryStock[0] ?? null;

        if (!$stock) {
            die('stock not found');
        }

        $currentStock = (int) $stock['quantity'];

        if ($data['quantity'] > $currentStock) {
            session_start();
            $_SESSION['error'] = 'Stock tidak mencukupi';
            header('Location: ../insertOutcomingGoods.php');
            exit;
        }


        $query = insertData('outcoming_goods', $data);

        if ($query['success']) {
            echo 
            "<script>
                    alert('Berhasil menambahkan data'); window.location.href = '../outcomingGoods.php';
            </script>";
        } else {
            echo 
            "<script>
                alert('Gagal menambahkan produk: " . $result['error'] . "');
            </script>";
        }
    }

?>