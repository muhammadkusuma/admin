<?php
// Konfigurasi Database
$host       = "localhost";
$user       = "root";     // Default user XAMPP
$password   = "12345678";         // Default password XAMPP (kosong)
$database   = "db_himasi"; // Nama database yang kita buat tadi

// Perintah untuk koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi (Opsional, untuk debugging)
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>