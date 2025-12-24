<?php
// FILE: admin/acara/hapus.php
include '../../includes/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // 1. Ambil nama file gambar dulu sebelum datanya dihapus
    $query_gambar = mysqli_query($koneksi, "SELECT poster FROM acara WHERE id_acara='$id'");
    $data_gambar = mysqli_fetch_array($query_gambar);
    $poster = $data_gambar['poster'];

    // 2. Hapus data dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM acara WHERE id_acara='$id'");

    if($hapus){
        // 3. Jika data database berhasil dihapus, hapus juga file fisiknya
        if($poster != "" && file_exists("../../assets/img/$poster")){
            unlink("../../assets/img/$poster");
        }
        
        echo "<script>alert('Data acara berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
}
?>