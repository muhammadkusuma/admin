<?php
// FILE: admin/anggota/hapus.php
include '../../includes/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // 1. Ambil nama file foto dulu sebelum dihapus datanya
    // Menggunakan 'id_user' sesuai database
    $query_cek = mysqli_query($koneksi, "SELECT foto FROM users WHERE id_user='$id'");
    
    // Cek apakah data ada
    if(mysqli_num_rows($query_cek) > 0){
        $data = mysqli_fetch_array($query_cek);
        $foto = $data['foto'];

        // 2. Hapus data dari tabel database
        $hapus = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");

        if($hapus){
            // 3. Jika berhasil dihapus di DB, hapus juga file fotonya di folder
            if($foto != "" && file_exists("../../assets/img/$foto")){
                unlink("../../assets/img/$foto");
            }
            
            echo "<script>alert('Anggota berhasil dihapus!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data di database!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    }

} else {
    // Jika diakses tanpa ID, kembalikan ke index
    header("Location: index.php");
}
?>