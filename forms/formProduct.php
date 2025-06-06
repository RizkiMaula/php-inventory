<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';


$id = $_GET['id'] ?? null;
$isEdit = $id !== null;


if ($isEdit) {
    $product = showDataById('products', $id);
    if (!$product) {
        echo "Data not found";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Update' : 'Tambah'; ?> Produk</title>
</head>
<body>
    <h1><?= $isEdit ? 'Update' : 'Tambah'; ?> Produk</h1>
    <form action="../logics/saveProduct.php" method="post">
        <?php if ($isEdit) : ?>
            <input type="hidden" name="id" id="id" value="<?= $product['id']; ?>">
        <?php endif; ?>


        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $product['name'] ?? ''; ?>">
        <br>
        <label for="category">Category</label>
        <input type="text" name="category" id="category" value="<?= $product['category'] ?? ''; ?>">
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?= $product['price'] ?? ''; ?>">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

