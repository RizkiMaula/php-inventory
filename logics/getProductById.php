<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (!isset($_GET['id'])) {
    echo "invalid request";
    exit;
} 

$id = $_GET['id'];

$result = showDataById('products', $id);

// ambil 1 data pertama 
$product = $result[0] ?? null;

if (!$product) {
    die('Data tidak ditemukan');
}
?>