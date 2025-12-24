<?php
// Mengaktifkan session php
session_start();

// Menghubungkan dengan koneksi
include 'include/koneksi.php';

// Menangkap data yang dikirim dari form login
// Kita gunakan fungsi mysqli_real_escape_string untuk mencegah injeksi SQL sederhana
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Menyeleksi data anggota dengan nim dan password yang sesuai
// Catatan: Untuk keamanan tingkat lanjut, sebaiknya gunakan password_verify() dan hashing.
// Namun untuk tahap belajar ini, kita gunakan perbandingan biasa sesuai data dummy 'nim123'.
$data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nim='$username' AND password='$password'");

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    // Jika data ditemukan, ambil detail datanya
    $row = mysqli_fetch_assoc($data);

    // Menyimpan data user ke dalam session
    $_SESSION['status'] = "login";
    $_SESSION['id_anggota'] = $row['id'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['role'] = $row['role']; // admin atau anggota

    // Cek role untuk mengarahkan ke halaman yang tepat (opsional)
    // Di sini kita arahkan semua ke dashboard admin
    header("location:admin/index.php");
} else {
    // Jika login gagal, alihkan kembali ke login.php dengan pesan gagal
    header("location:login.php?pesan=gagal");
}
?>