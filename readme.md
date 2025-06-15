📦 #Inventory Transaction Management App
Sistem manajemen stok dan transaksi berbasis PHP, Bootstrap, dan MySQL. Proyek ini digunakan untuk mengelola data barang, transaksi penjualan, serta stok keluar dan masuk dengan fitur validasi dan otorisasi berbasis role (admin).

🗂️ Fitur Utama
✅ Autentikasi dengan session dan role-based access (admin)

📥 Manajemen Incoming Goods (barang masuk)

📤 Manajemen Outcoming Goods (barang keluar)

💰 Manajemen transaksi penjualan

📊 Perhitungan total harga otomatis

⚠️ Validasi stok saat transaksi

⏳ Notifikasi error otomatis hilang setelah 4 detik

🔧 Teknologi yang Digunakan
Teknologi Fungsi
PHP (vanilla) Backend dan logika server
MySQL Database utama
Bootstrap 5 Desain antarmuka (UI)
JavaScript (ES Module) Helper untuk kalkulasi harga
HTML/CSS Struktur dan gaya dasar

🏗️ Struktur Direktori

.
├── assets/
│ └── css/ (Bootstrap)
├── js/
│ └── helper.js # Fungsi JavaScript modular
├── logics/
│ ├── functions.php # Semua fungsi utama
│ ├── saveTransactions.php
│ └── tambahIncomingGoods.php
├── formTransaction.php # Form tambah/edit transaksi
├── insertOutcomingGoods.php
├── incomingGoods.php
├── outcomingGoods.php
├── transactions.php
├── koneksi.php # Koneksi ke database
├── forbidden.php # Akses ditolak
└── README.md
⚙️ Instalasi & Konfigurasi
Clone repository:

git clone https://github.com/namamu/inventory-app.git
cd inventory-app
Import database:

Buat database di MySQL (misalnya: inventory)

Import file .sql yang sudah disediakan (jika ada)

Atur koneksi database (koneksi.php):

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'inventory';
Jalankan di localhost:

Buka di browser:

http://localhost/inventory-app/index.php
📘 Cara Menggunakan
🔑 Login
Login sebagai admin untuk mengakses seluruh fitur.

📥 Tambah Incoming Goods
Buka incomingGoods.php

Pilih produk, isi supplier dan quantity

Klik Submit

📤 Tambah Outcoming Goods
Buka outcomingGoods.php

Pilih produk dan alasan (reason: sold, damaged, dll)

Validasi stok otomatis dicek

💰 Tambah Transaksi
Buka formTransaction.php

Pilih produk dan user

Jumlah penjualan (total_sold) akan dicek terhadap stok

Harga per unit akan terisi otomatis

Total harga akan dihitung otomatis via JavaScript

📎 Helper JavaScript
setPriceProduct(productSelectId, priceInputId)
Mengisi input harga berdasarkan produk yang dipilih.

calculatePrice(productSelectId, soldInputId, totalInputId)
Menghitung total_price = sold \* price.

timeoutAlert()
Menghapus elemen alert (ID: #error-alert) setelah 4 detik.

🛡️ Validasi & Keamanan
Role admin wajib untuk akses halaman manajemen

Stok akan dicek sebelum insert transaksi

Error message disimpan dalam session dan tampil dengan alert

Validasi min dan max di input form

💡 Catatan Pengembangan
Belum terdapat sistem login (harap disesuaikan)

Belum ada fitur pengurangan stok otomatis saat transaksi (bisa ditambahkan)

Form edit transaksi sudah didukung melalui parameter id

📜 Lisensi
Proyek ini bersifat open-source dan dapat dikembangkan lebih lanjut.
