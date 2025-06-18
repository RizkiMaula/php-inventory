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
            $query = updateData('transactions', $data,'id', $_POST['id']);

            if ($query['success']) {
                $productId = $data['product_id'];
                $transactionId = $query['id'];
                $quantity = (int)$data['total_sold'];
                $reason = 'sold';

                // hapus data lama
                $delete = deleteById('outcoming_goods', $transactionId); 

                // tambahkan data ke outcoming_goods
                $query = insertData('outcoming_goods', [
                    'product_id' => $productId,
                    'transaction_id' => $transactionId,
                    'quantity' => $quantity,
                    'reason' => $reason,
                    'date' => date('Y-m-d H:i:s'),
                ]);

                // kurangi stock
                $update = updateData('stock', ['quantity' => $stock['quantity'] - $quantity], 'product_id', $productId);
            }
            $message = $query['success'] ? 'Berhasil ubah data' : 'Gagal ubah produk: ' . $query['error'];
    } else {
        // insert
            $query = insertData('transactions', $data);

            if ($query['success']) {
                $productId = $data['product_id'];
                $transactionId = $query['id'];
                $quantity = (int)$data['total_sold'];
                $reason = 'sold';

                // tambahkan data ke outcoming_goods
                $query = insertData('outcoming_goods', [
                    'product_id' => $productId,
                    'transaction_id' => $transactionId,
                    'quantity' => $quantity,
                    'reason' => $reason,
                    'date' => date('Y-m-d H:i:s'),
                ]);

                // kurangi stock
                $update = updateData('stock', ['quantity' => $stock['quantity'] - $quantity], 'product_id', $productId);
            }

            $message = $query['success'] ? 'Berhasil menambahkan data' : 'Gagal menambahkan produk: ' . $query['error'];
    }

    echo 
    "<script>
        alert('$message');
        window.location.href = '../transactions.php';
    </script>";
}


?>