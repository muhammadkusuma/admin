<?php
$host = "localhost";
$user = "root";
$pass = "12345678";
$db = "db_himasi"; // Sesuaikan dengan nama databasemu

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal terkoneksi ke database: " . mysqli_connect_error());
}

// --- PENTING: BASE URL ---
// Definisikan alamat utama website kamu di sini.
// Karena kamu pakai port 8000, gunakan ini:
$base_url = "http://localhost:8000/";

// Jika nanti sudah di-hosting, ganti jadi nama domain (misal: "https://himasi.com/")
?>