<?php 
session_start();
require_once '../koneksi.php';
require_once '../logics/functions.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = showUserByEmail($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            echo "<script>alert('Login berhasil!'); window.location.href = '../index.php';</script>";
            exit;
        } else {
           echo "<script>alert('password salah!'); window.location.href = '../forms/formLogin.php';</script>";
           exit;
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location.href = '../forms/formLogin.php';</script>";
        exit;
    }
}

?>