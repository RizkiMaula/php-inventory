<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Incoming Goods</title>
</head>
<body>
    <h1>Tambah Incoming Goods</h1>
    <form action="logics/tambahIncomingGoods.php" method="post">
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
        <label for="supplier">Supplier</label>
        <input type="text" name="supplier" id="supplier">
        <br>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

