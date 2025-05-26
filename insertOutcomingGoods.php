<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Incoming Goods</title>
</head>
<body>
    <h1>Tambah Outcoming Goods</h1>
    <form action="logics/tambahOutcomingGoods.php" method="post">
        <label for="name">Product Name</label>
        <select name="product_id" id="product">
            <?php 
            require_once 'koneksi.php';
            require_once 'logics/functions.php';
                $products = showData('products');
                foreach ($products as $product) {
                    echo "<option value='" . $product['id'] . "'>" . $product['name'] . "</option>";
                }
            ?>
        </select>
        <br>
        <label for="Transaction_id">Transaction ID</label>
        <select name="Transaction_id" id="Transaction_id">
            <?php 
            require_once 'koneksi.php';
            require_once 'logics/functions.php';
                $transactions = showData('transactions');
                foreach ($transactions as $transaction) {
                    echo "<option value='" . $transaction['id'] . "'>" . $transaction['id'] . "</option>";
                }
            ?>
        </select>
        <br>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">
        <br>
        <label for="reason">Reason</label>
    <select name="reason" id="reason">
        <option value="damaged">Damaged</option>
        <option value="expired">Expired</option>
        <option value="sold">Sold</option>
        <option value="other">Other</option>
    </select>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

