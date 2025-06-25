<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';
session_start();


$id = $_GET['id'] ?? null;
$isEdit = $id !== null;


if ($isEdit) {
    $product = showDataById('products', $id);
    if (!$product) {
        echo "Data not found";
        exit;
    }
}

if ($_SESSION['role'] != 'admin') {
    header('Location: ../forbidden.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Update' : 'Tambah'; ?> Produk</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5 border p-5 rounded shadow">
        <h1><?= $isEdit ? 'Update' : 'Tambah'; ?> Produk</h1>
        <form action="../logics/saveProduct.php" method="post">
            <?php if ($isEdit) : ?>
                <input type="hidden" name="id" id="id" value="<?= $product['id']; ?>">
            <?php endif; ?>
    
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?? ''; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" name="category" value="<?= $product['category'] ?? ''; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" value="<?= $product['price'] ?? ''; ?>">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Submit</button>
            <a href="../produk.php" class="btn btn-danger mt-3 w-100">
                Cancel
            </a>
        </form>
    </div>
</body>
</html>

