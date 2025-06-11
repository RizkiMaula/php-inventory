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
    <h1><?= $isEdit ? 'Update' : 'Add'; ?> Transaction</h1>
    <form action="../logics/saveTransactions.php" method="post">

    <!-- hidden id, kalo edit ada tapi di hidden kalo insert ya ga ada -->
    <?php if ($isEdit) : ?>
        <input type="hidden" name="id" id="id" value="<?= $id; ?>">
    <?php endif; ?>

        <!-- product name -->
        <label for="name">Product Name</label>
        <select name="product_id" id="product_id">
            <?php foreach ($products as $product) : ?>
                <option 
                    value="<?= $product['id'] ?? ''; ?>" 
                    data-price="<?= $product['price'] ?>" 
                    <?= $product['id'] ? 'selected' : ''; ?>>
                        <?= $product['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <!-- buat name -->
        <label for="user_id">Name</label>
        <select name="user_id" id="user_id">
            <?php foreach ($users as $user) : ?>            
                <option value="<?= $user['id'] ?? ''; ?>"
                    <?= $user['id'] ? 'selected' : ''; ?>>
                    <?= $user['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <!-- total sold -->
        <label for="total_sold">Total Sold</label>
        <input type="text" name="total_sold" id="total_sold" value="<?= $transaction['total_sold'] ?? ''; ?>">
        <br>

        <!-- price -->
        <label for="price_per_unit">Price Per Unit</label>
        <input type="text" name="price_per_unit" id="price_per_unit"  value="<?= $transaction['price_per_unit'] ?? ''; ?>">
        <br>

        <!-- total price -->
        <label for="total_price">Total</label>
        <input type="text" name="total_price" id="total_price" value="<?= $transaction['total_price'] ?? ''; ?>">
        <br>

        <!-- payment method -->
        <label for="payment_method">Payment Method</label>
            <select name="payment_method" id="payment_method">
               <option value="cash">Cash</option>
               <option value="debit">Debit</option>
               <option value="credit">Credit</option>
               <option value="ewallet">Ewallet</option>
            </select>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <script type="module">
        import { setPriceProduct, calculatePrice } from '../js/helper.js';

        setPriceProduct('product_id', 'price_per_unit');
        calculatePrice('total_sold', 'price_per_unit', 'total_price');
    </script>

</body>
</html>

