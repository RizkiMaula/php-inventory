<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transactions</title>
</head>
<body>
    <h1>Tambah Transactions</h1>
    <form action="logics/tambahOutcomingGoods.php" method="post">
        <label for="name">Product Name</label>
        <select name="product_id" id="product">
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id']; ?>" data-price="<?= $product['price']; ?>"> <?= $product['name']; ?> </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="user_id">Name</label>
        <select name="user_id" id="user_id">
            <?php 
            require_once 'koneksi.php';
            require_once 'logics/functions.php';
                $users = showData('users');
                foreach ($users as $user) {
                    echo "<option value='" . $user['id'] . "'>" . $user['name'] . "</option>";
                }
            ?>
        </select>
        <br>
        <label for="sold">Total Sold</label>
        <input type="text" name="sold" id="sold">
        <br>
        <label for="price">Price Per Unit</label>
        <input type="text" name="price" id="price" >
        <br>
        <label for="total">Total</label>
        <input type="text" name="total" id="total" >
        <br>
        <label for="payment_method">Payment Method</label>
    <select name="payment_method" id="payment_method">
        <option value="cash">Cash</option>
        <option value="credit">Credit</option>
        <option value="debit">Debit</option>
        <option value="ewallet">Ewallet</option>
    </select>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <!-- <script>
        const productSelect = document.getElementById('product');
        const priceInput = document.getElementById('price');

        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
        })

        // trigger saat pertama dibuat

        window.addEventListener(DOMContentLoaded, function() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
        })
    </script> -->
    <script type="module">
        import { setPriceProduct, calculatePrice } from './js/helper.js';

        setPriceProduct('product', 'price');
        calculatePrice('price', 'sold', 'total');
    </script>
</body>
</html>

