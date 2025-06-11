<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5 border p-5 rounded shadow">
    <h1>Login</h1>
        <form action="../logics/login.php" method="post">
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
            <button type="submit" name="submit" class="btn btn-primary mt-3 w-100">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="formRegistration.php">Register</a></p>
    </div>
</body>
</html>
