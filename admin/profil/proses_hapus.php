<?php
include '../../include/koneksi.php';

$id = $_GET['id'];

// Ambil gambar lama
$query_img = mysqli_query($koneksi, "SELECT gambar FROM profil WHERE id='$id'");
$data = mysqli_fetch_assoc($query_img);
$gambar = $data['gambar'];

// Hapus file
if ($gambar != "" && file_exists("../../assets/uploads/profil/" . $gambar)) {
    unlink("../../assets/uploads/profil/" . $gambar);
}

// Hapus data
$hapus = mysqli_query($koneksi, "DELETE FROM profil WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>