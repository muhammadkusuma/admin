<?php
include '../../includes/koneksi.php';

$id = $_GET['id'];

// 1. Ambil data gambar dulu biar bisa dihapus dari folder
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$id'"));
$gambar_lama = $data['gambar'];

// 2. Hapus gambar fisik di folder (Jika ada)
if(file_exists("../../assets/img/$gambar_lama")){
    unlink("../../assets/img/$gambar_lama");
}

// 3. Hapus data di database
$hapus = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita='$id'");

if($hapus){
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "Gagal hapus: " . mysqli_error($koneksi);
}
?>