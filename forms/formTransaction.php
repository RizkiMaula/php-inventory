<?php 
    require_once '../koneksi.php';
    require_once '../logics/functions.php';

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
    $products = showData('products');
    $users = showData('users');
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
        <form action="../logics/saveTransactions.php" method="post">
    
            <!-- hidden id, kalo edit ada tapi di hidden kalo insert ya ga ada -->
            <?php if ($isEdit) : ?>
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
            <?php endif; ?>
    
            <!-- product name -->
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <select class="form-select" name="product_id" id="product_id">
                        <option disabled selected>Choose...</option>
                        <?php foreach ($products as $product) : ?>
                            <option 
                                value="<?= $product['id'] ?? ''; ?>" 
                                data-price="<?= $product['price'] ?>" 
                                <?= $product['id'] ? 'selected' : ''; ?>>
                                    <?= $product['name'] ?>
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
                         <option disabled selected>Choose...</option>
                         <?php foreach ($users as $user) : ?>            
                             <option value="<?= $user['id'] ?? ''; ?>"
                                 <?= $user['id'] ? 'selected' : ''; ?>>
                                 <?= $user['name'] ?>
                             </option>
                         <?php endforeach; ?>
                     </select>
                 </div>
             </div>

            <!-- total sold -->
            <div class="row mb-3">
                <label for="total_sold" class="col-sm-2 col-form-label">Total Sold</label>
                <div class="col-sm-10">
                    <input type="text" name="total_sold" id="total_sold" class="form-control" value="<?= $transaction['total_sold'] ?? ''; ?>">
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
                        <option disabled selected>Choose...</option>
                        <option value="cash">Cash</option>
                        <option value="debit">Debit</option>
                        <option value="credit">Credit</option>
                        <option value="ewallet">Ewallet</option>
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
        import { setPriceProduct, calculatePrice } from '../js/helper.js';

        setPriceProduct('product_id', 'price_per_unit');
        calculatePrice('total_sold', 'price_per_unit', 'total_price');
    </script>

</body>
</html>

