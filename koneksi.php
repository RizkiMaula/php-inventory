<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "pemanasan";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
} 

?>