# 📦 Inventory Transaction Management App

Sistem manajemen stok dan transaksi berbasis PHP, Bootstrap, dan MySQL. Proyek ini digunakan untuk mengelola data barang, transaksi penjualan, serta stok keluar dan masuk dengan fitur validasi dan otorisasi berbasis role (admin).

## 🗂️ Fitur Utama

✅ Autentikasi dengan session dan role-based access (admin)

📦 Manajemen Product

🏪 Manajemen Stock

📥 Manajemen Incoming Goods (barang masuk)

📤 Manajemen Outcoming Goods (barang keluar)

💰 Manajemen transaksi penjualan

📊 Perhitungan total harga otomatis

⚠️ Validasi stok saat transaksi

⏳ Notifikasi error otomatis hilang setelah 4 detik

## 🔧 Teknologi yang Digunakan

Teknologi Fungsi
PHP (vanilla) Backend dan logika server\
MySQL Database utama\
Bootstrap 5 Desain antarmuka (UI)\
JavaScript (ES Module) Helper untuk kalkulasi harga\
HTML/CSS Struktur dan gaya dasar

## 🏗️ Struktur Direktori

.
├── assets/\
│ └── css/ (Bootstrap)\
│ └── js/ (Bootstrap)\
├── forms/\
│ └── formLogin.php # Form Login\
│ └── formProduct.php # Form untuk tambah dan edit product \
│ └── formRegistration.php # Form untuk Registrasi \
│ └── formTransaction.php # Form untuk tambah dan edit transaction \
├── js/\
│ └── helper.js # Fungsi JavaScript modular\
├── logics/\
│ ├── delete.php # Untuk menghapus data di database\
│ ├── functions.php # Semua fungsi utama\
│ ├── getProductById.php # Untuk mendapatkan melalui Id\
│ ├── login.php # Untuk menjalankan fungsi login \
│ ├── logout.php # Untuk menjalankan fungsi logout \
│ ├── register.php # Untuk menjalankan fungsi registrasi\
│ ├── saveProduct.php # Untuk menjalankan fungsi tambah dan edit product\
│ ├── saveTransactions.php # Untuk menjalankan fungsi tambah dan edit product \
│ └── tambahIncomingGoods.php # Untuk menjalankan fungsi tambah incoming goods\
│ └── tambahOutcomingGoods.php # Untuk menjalankan fungsi tambah outcoming goods\
├── forbidden.php # Halaman jika akses ditolak (bukan admin) \
├── incomingGoods.php # Tampilan barang masuk \
├── index.php # Halaman utama/dashboard \
├── insertIncomingGoods.php # Form untuk menambah barang masuk \
├── insertOutcomingGoods.php # Form untuk menambah barang keluar \
├── koneksi.php # Koneksi database \
├── outcomingGoods.php # Tampilan barang keluar \
├── package-lock.json # File lock NPM \
├── package.json # Konfigurasi NPM (misal jika pakai lucide, dsb) \
├── produk.php # Kelola produk \
├── profile.php # Halaman profil user \
├── readme.md # Dokumentasi proyek \
├── stock.php # Kelola stok produk \
└── transactions.php # Kelola dan lihat transaksi

## ⚙️ Instalasi & Konfigurasi

1. Clone repository:
   ```bash
   git clone https://github.com/namamu/inventory-app.git
   cd inventory-app
   ```
2. Import Database:\
   Buat database di MySQL (misalnya: inventory)
   Import file `.sql` yang sudah disediakan (jika ada)

3. Atur koneksi database (koneksi.php):

   ```php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'inventory';
   ```

   Lalu jalankan di localhost.

4. Buka di browser:
   ```
   http://localhost/coba-doang/index.php
   ```
   Lalu jalankan di localhost.

## Cara Menggunakan

1. 🔑 Login\
   Login sebagai admin untuk mengakses seluruh fitur.\
   Akun Admin:

   ```
   email: adm123@mail.com
   password: qwerty123
   ```

   Akun Customer:

   ```
   email: cust112@mail.com
   password: qwerty123
   ```

2. 📥 Klik icon yang ada (Misalnya Product)

3. Pilih Aksi yang ingin di kerjakan:

   - Klik Tambah Data untuk tambah data.
     - Isi sesuai data yang ingin dimasukan
     - Klik submit jika sudah benar
     - Klik _cancel_ untuk batal dan kembali ke halaman _form_
   - Klik Edit untuk Edit data.
     - Klik submit jika sudah benar
     - Klik _cancel_ untuk batal dan kembali ke halaman _form_
   - Klik Delete untuk Delete data.
     > [!NOTE]\
     > Semua sama, kecuali data stock. Pada data stock hanya ada Delete.

4. 💰 Tambah Transaksi
   - Buka formTransaction.php
   - Pilih produk dan user
   - Jumlah penjualan (total_sold) akan dicek terhadap stok
   - Harga per unit akan terisi otomatis
   - Total harga akan dihitung otomatis via JavaScript

## 📎 Helper JavaScript

- setPriceProduct(productSelectId, priceInputId)\
  Mengisi input harga berdasarkan produk yang dipilih.
- calculatePrice(productSelectId, soldInputId, totalInputId)\
  Menghitung total_price = sold \* price.
- timeoutAlert()\
  Menghapus elemen alert (ID: #error-alert) setelah 4 detik.

## 🛡️ Validasi & Keamanan

- Terdapat 2 Role, `Admin` dan `Customer`
- Role `Admin` wajib untuk akses halaman manajemen
- Role `Customer` hanya dapat melihat data `Stock`dan `Product` dan tidak bisa melakukan aksi
- Stok akan dicek sebelum insert transaksi
- Error message disimpan dalam session dan tampil dengan alert
- Validasi min dan max di input form

## 💡 Catatan Pengembangan

- sudah terdapat pengurangan stok otomatis yang diatur trigger di dalam `database`
- Form edit transaksi sudah didukung melalui parameter id
  > [!NOTE]\
  > pada versi live demo, menggunakan infinity free dan itu membatasi untuk penggunaan trigger. Jadi untuk perhitungan pada live demo menggunakan logic dalam program.

## 📜 Lisensi

Proyek ini bersifat open-source dan dapat dikembangkan lebih lanjut.
