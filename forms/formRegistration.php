<!-- forms/formRegister.php -->

<?php 
require_once '../koneksi.php';
require_once '../logics/functions.php';


$data = showEnum('users', 'role');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5 border p-5 rounded shadow">
        <h1>Register</h1>
        <form action="../logics/register.php" method="post">
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-select" name="role">
                    <option disabled selected>Choose...</option>
                    <?php foreach ($data as $role): ?>
                        <option value="<?= $role ?>"><?= ucfirst($role) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Register</button>
        </form>
        <p class="mt-3">Already have an account? <a href="formLogin.php">Login</a></p>
    </div>
</body>
</html>
