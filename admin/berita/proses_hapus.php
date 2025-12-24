<?php
include '../../include/koneksi.php';

// Tangkap ID dari URL
$id = $_GET['id'];

// 1. Ambil nama gambar dulu sebelum menghapus datanya
$query_gambar = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id='$id'");
$data = mysqli_fetch_assoc($query_gambar);
$foto_lama = $data['gambar'];

// 2. Hapus file gambar dari folder jika ada
$path_file = "../../assets/uploads/berita/" . $foto_lama;
if (file_exists($path_file)) {
    unlink($path_file);
}

// 3. Hapus data dari database
$hapus = mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>