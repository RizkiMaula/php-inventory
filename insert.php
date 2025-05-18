<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="logics/TambahProduct.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="category">Category</label>
        <input type="text" name="category" id="category">
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

