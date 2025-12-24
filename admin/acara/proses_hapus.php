<?php
include '../../include/koneksi.php';

$id = $_GET['id'];

// Ambil nama poster lama
$query_poster = mysqli_query($koneksi, "SELECT poster FROM acara WHERE id='$id'");
$data = mysqli_fetch_assoc($query_poster);
$poster = $data['poster'];

// Hapus file poster jika ada
if ($poster != "" && file_exists("../../assets/uploads/acara/" . $poster)) {
    unlink("../../assets/uploads/acara/" . $poster);
}

// Hapus data dari database
$hapus = mysqli_query($koneksi, "DELETE FROM acara WHERE id='$id'");

if ($hapus) {
    echo "<script>alert('Agenda berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus agenda!'); window.location='index.php';</script>";
}
?>