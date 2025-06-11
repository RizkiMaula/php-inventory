<?php 
include_once 'koneksi.php';
include_once 'logics/functions.php';


$data = showData('products');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Incoming Goods</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 border p-5 rounded shadow">
        <h1>Tambah Incoming Goods</h1>
        <form action="logics/tambahIncomingGoods.php" method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Product Name</label>
                <div class="col-sm-10">
                    <select class="form-select" name="product_id" id="product">
                        <?php foreach ($data as $product) : ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="supplier">Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="supplier" id="supplier">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="quantity">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="quantity" id="quantity">
                </div>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Submit</button>
            <a href="incomingGoods.php" class="btn btn-danger mt-3 w-100">Cancel</a>
        </form>
    </div>
</body>
</html>

