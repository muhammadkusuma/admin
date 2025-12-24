<?php
include '../../include/koneksi.php';

$id = $_GET['id'];

// Ambil nama foto lama
$query_foto = mysqli_query($koneksi, "SELECT foto FROM anggota WHERE id='$id'");
$data = mysqli_fetch_assoc($query_foto);
$foto = $data['foto'];

// Hapus file foto jika bukan 'default.jpg' dan filenya ada
if ($foto != "default.jpg" && file_exists("../../assets/uploads/anggota/" . $foto)) {
    unlink("../../assets/uploads/anggota/" . $foto);
}

// Hapus data dari database
$hapus = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Data anggota berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
?>