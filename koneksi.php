<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "pemanasan1";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
} 

?>