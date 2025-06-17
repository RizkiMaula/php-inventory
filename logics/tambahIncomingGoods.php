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
        // ✅ Update stock

        $productId = $data['product_id'];
        $quantity = (int)$data['quantity'];
        
        // 1. Cek apakah stock untuk product_id sudah ada
        $existingStock = showByColumn('stock', 'product_id', $productId);

        if ($existingStock) {
            // 2. Update quantity existing
            $newQuantity = $existingStock[0]['quantity'] + $quantity;
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