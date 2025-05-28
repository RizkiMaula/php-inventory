<?php 
    require_once 'koneksi.php';
    require_once 'logics/functions.php';

    if (!isset($_GET['id'])) {
        echo "invalid request";
        exit;
    } 

    $id = $_GET['id'];
    $transaction = showDataById('transactions', $id);

    if (!$transaction) {
        echo "Data tidak ditemukan";
        exit;
    }

    $products = showData('products');
    $users = showData('users');

    var_dump($transaction);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
</head>
<body>
    <h1>Update Produk</h1>
    <form action="logics/updateTransactions.php" method="post">

    <!-- hidden id -->
    <input type="hidden" name="id" id="id" value="<?= $transaction['id']; ?>">

        <!-- product name -->
        <label for="name">Product Name</label>
        <select name="product_id" id="product_id">
            <?php foreach ($products as $product) : ?>
                <option 
                    value="<?= $product['id'] ?>" 
                    data-price="<?= $product['price'] ?>" 
                    <?= $product['id'] == $transaction['product_id'] ? 'selected' : ''; ?> >
                        <?= $product['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <!-- buat name -->
        <label for="user_id">Name</label>
        <select name="user_id" id="user_id">
            <?php foreach ($users as $user) : ?>            
                <option value="<?= $user['id'] ?>"
                    <?= $user['id'] == $transaction['user_id'] ? 'selected' : ''; ?>>
                    <?= $user['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <!-- total sold -->
        <label for="total_sold">Total Sold</label>
        <input type="text" name="total_sold" id="total_sold" value="<?= $transaction['total_sold'] ?>">
        <br>

        <!-- price -->
        <label for="price_per_unit">Price Per Unit</label>
        <input type="text" name="price_per_unit" id="price_per_unit"  value="<?= $transaction['price_per_unit'] ?>">
        <br>

        <!-- total price -->
        <label for="total_price">Total</label>
        <input type="text" name="total_price" id="total_price" value="<?= $transaction['total_price'] ?>">
        <br>

        <!-- payment method -->
        <label for="payment_method">Payment Method</label>
            <select name="payment_method" id="payment_method">
                <option value="cash" <?= $transaction['payment_method'] == 'cash' ? 'selected' : '';?> >Cash</option>
                <option value="credit <?= $transaction['payment_method'] == 'credit' ? 'selected' : '';?>">Credit</option>
                <option value="debit <?= $transaction['payment_method'] == 'debit' ? 'selected' : '';?>">Debit</option>
                <option value="ewallet <?= $transaction['payment_method'] == 'ewallet' ? 'selected' : '';?>">Ewallet</option>
            </select>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <script type="module">
        import { setPriceProduct, calculatePrice } from './js/helper.js';

        setPriceProduct('product_id', 'price_per_unit');
        calculatePrice('total_sold', 'price_per_unit', 'total_price');
    </script>

</body>
</html>

