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
            // Update stock jadi berkurang

            $productId = $data['product_id'];
            $quantity = (int)$data['quantity'];
            
            // 1. Cek apakah stock untuk product_id sudah ada
            $existingStock = showByColumn('stock', 'product_id', $productId);

            if ($existingStock) {
                // 2. Update quantity existing
                $newQuantity = $existingStock[0]['quantity'] - $quantity;
                updateData('stock', ['quantity' => $newQuantity], 'product_id', $productId);
            } else {
                // 3. Insert stock baru
                insertData('stock', [ 
                    'product_id' => $productId, 
                    'quantity' => $quantity 
                ]);
            }
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