<?php
// logics/register.php
require_once '../koneksi.php';
require_once '../logics/functions.php';

if (isset($_POST['submit'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'role' => $_POST['role'],
    ];

    $query = insertData('users', $data);

    if ($query['success']) {
        echo 
        "<script>
                 alert('Berhasil menambahkan data'); window.location.href = '../forms/formLogin.php';
        </script>";
    } else {
        echo 
        "<script>
            alert('Gagal menambahkan produk: " . $query['message'] . "');
        </script>";
    }
}
?>
