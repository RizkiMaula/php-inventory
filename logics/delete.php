<?php
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_GET['table']) && isset($_GET['id']) && isset($_GET['redirect'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $redirect = $_GET['redirect'];

    // validate allowed tables 
    $allowedTable = ['users', 'incoming_goods', 'outcoming_goods', 'products', 'stock', 'transactions'];

    if (!in_array($table, $allowedTable)) {
        die('invalid request'); //prevent sql injection
    }

    // Jika menghapus incoming_goods, maka tambah stock
    if ($table === 'outcoming_goods') {
        $outcoming = showById('outcoming_goods', $id);
        if ($outcoming) {
            $productId = $outcoming['product_id'];
            $quantity = $outcoming['quantity'];

            // Ambil stock sekarang
            $stock = showByColumn('stock', 'product_id', $productId);
            if ($stock) {
                $newQuantity = $stock[0]['quantity'] + $quantity;
                updateData('stock', ['quantity' => $newQuantity], 'product_id', $productId);
            }
        }
    }

    if ($table === 'transactions') {
        # code...
    }


    // Jika menghapus incoming_goods, maka kurangi stock
    if ($table === 'incoming_goods') {
        // Ambil record yang akan dihapus
        $incoming = showById('incoming_goods', $id);
        if ($incoming) {
            $productId = $incoming['product_id'];
            $quantity = $incoming['quantity'];

            // Ambil stock sekarang
            $stock = showByColumn('stock', 'product_id', $productId);
            if ($stock) {
                $newQuantity = $stock[0]['quantity'] - $quantity;
                if ($newQuantity < 0) $newQuantity = 0; // cegah negatif
                updateData('stock', ['quantity' => $newQuantity], 'product_id', $productId);
            }
        }
    }

    // 🔥 Jika yang dihapus adalah produk, hapus juga stok yang berkaitan
    if ($table === 'products') {
        $deleteStock = deleteByColumn('stock', 'product_id', $id);
        // bisa log error kalau gagal hapus stok
    }


    // delete data
    $result = deleteById($table, $id);

    if ($result) {
        header("Location: $redirect");
        exit();
    } else {
        echo "gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    echo "invalid request";
}
?>;