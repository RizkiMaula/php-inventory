<?php 
    require_once '../koneksi.php';
    require_once '../logics/functions.php';
    session_start();

    $id = $_GET['id'] ?? null;
    $isEdit = $id !== null;

    if ($isEdit) {
        $transaction = showDataById('transactions', $id);
        if (!$transaction) {
            echo "Data not found";
            exit;
        }
    } 

    // buat isi select option
    $users = showData('users');
    $productQnt = showDataJoin('stock', 'products', 'stock.product_id = products.id', 'products.id, products.name, products.price, stock.quantity', 'ORDER BY `products`.`name` ASC');
    $paymentMethods = showEnum('transactions', 'payment_method');

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
    <title><?= $isEdit ? 'Update' : 'Add'; ?> Transaction</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5 border p-5 rounded shadow">
        <h1><?= $isEdit ? 'Update' : 'Add'; ?> Transaction</h1>

        <?php if (isset($_SESSION['error'])) : ?>
            <div id="error-alert" class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="../logics/saveTransactions.php" method="post">
    
            <!-- hidden id, kalo edit ada tapi di hidden kalo insert ya ga ada -->
            <?php if ($isEdit) : ?>
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
            <?php endif; ?>
    
            <!-- product name -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Product Name</label>
                <div class="col-sm-10">
                    <select class="form-select" name="product_id" id="product" onchange="updateMaxStock()">
                        <?php foreach ($productQnt as $product) : ?>
                            <option 
                                value="<?= $product['id'] ?>" 
                                data-price="<?= $product['price'] ?>"
                                data-stock="<?= $product['quantity'] ?>"
                                 <?= ($isEdit && $transaction['product_id'] == $product['id']) ? 'selected' : '' ?>
                                >
                                <?= $product['name'] ?> (Stok: <?= $product['quantity'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- buat name -->
             <div class="row mb-3">
                 <label for="user_id" class="col-sm-2 col-form-label">Name</label>
                 <div class="col-sm-10">
                     <select class="form-select" name="user_id" id="user_id">
                        <option disabled <?= !$isEdit ? 'selected' : ''; ?> selected>Choose...</option>
                         <?php foreach ($users as $user) : ?>            
                            <option value="<?= $user['id']; ?>"
                                <?= ($isEdit && $transaction['user_id'] == $user['id']) ? 'selected' : ''; ?>>
                                <?= $user['name']; ?>
                            </option>
                         <?php endforeach; ?>
                     </select>
                 </div>
             </div>

            <!-- total sold -->
            <div class="row mb-3">
                <label for="total_sold" class="col-sm-2 col-form-label">Total Sold</label>
                <div class="col-sm-10">
                    <input type="number" min="1" name="total_sold" id="total_sold" class="form-control" value="<?= $transaction['total_sold'] ?? ''; ?>" required>
                </div>
            </div>
    
            <!-- price -->
            <div class="row mb-3">
                <label for="price_per_unit" class="col-sm-2 col-form-label">Price Per Unit</label>
                <div class="col-sm-10">
                    <input type="text" name="price_per_unit" id="price_per_unit" class="form-control" value="<?= $transaction['price_per_unit'] ?? ''; ?>">
                </div>
            </div>
    
            <!-- total price -->
             <div class="row mb-3">
                <label for="total_price" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                     <input type="text" name="total_price" id="total_price" class="form-control" value="<?= $transaction['total_price'] ?? ''; ?>">
                </div>
             </div>
    
            <!-- payment method -->
            <div class="row mb-3">
                <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
                <div class="col-sm-10">                  
                    <select class="form-select" name="payment_method" id="payment_method">
                        <option disabled>Choose...</option>
                        <?php foreach ($paymentMethods as $method) : ?>
                            <option value="<?= $method ?>" <?= ($isEdit && $transaction['payment_method'] == $method) ? 'selected' : ''; ?>><?= ucfirst($method) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Submit</button>
            <a href="../transactions.php" class="btn btn-danger mt-3 w-100">
                Cancel
            </a>
        </form>
    </div>

    <script type="module">
        import { setPriceProduct, calculatePrice, updateMaxStock } from '../js/helper.js';

        document.getElementById('product').addEventListener('change', updateMaxStock);

        window.addEventListener('DOMContentLoaded', updateMaxStock);

        setPriceProduct('product', 'price_per_unit');
        calculatePrice('total_sold', 'price_per_unit', 'total_price');
    </script>

</body>
</html>

