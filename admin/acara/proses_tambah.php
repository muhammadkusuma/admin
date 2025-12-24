<?php
// FILE: admin/acara/proses_tambah.php
include '../../includes/koneksi.php';

if(isset($_POST['simpan'])){
    // 1. TANGKAP DATA DARI FORM
    $judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
    
    // --- BAGIAN INI YANG BARU DITAMBAHKAN ---
    $kategori   = mysqli_real_escape_string($koneksi, $_POST['kategori']); 
    // ----------------------------------------
    
    $tanggal    = $_POST['tanggal'];
    $lokasi     = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $deskripsi  = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // 2. PROSES UPLOAD FOTO POSTER
    $poster     = $_FILES['poster']['name'];
    $tmp        = $_FILES['poster']['tmp_name'];
    $poster_baru = date('dmYHis').'-'.$poster; // Rename agar unik
    $path       = "../../assets/img/".$poster_baru;

    if(move_uploaded_file($tmp, $path)){
        
        // 3. QUERY INSERT DATABASE (UPDATE DI SINI)
        // Perhatikan ada kolom 'kategori' dan variabel '$kategori' ditambahkan
        $query = "INSERT INTO acara (judul_acara, kategori, tanggal_pelaksanaan, lokasi, deskripsi, poster) 
                  VALUES ('$judul', '$kategori', '$tanggal', '$lokasi', '$deskripsi', '$poster_baru')";
        
        $simpan = mysqli_query($koneksi, $query);

        if($simpan){
            echo "<script>alert('Acara berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database!'); window.location='tambah.php';</script>";
        }

    } else {
        echo "<script>alert('Gagal upload poster!'); window.location='tambah.php';</script>";
    }

} else {
    // Jika akses langsung tanpa tombol simpan
    header("Location: index.php");
}
?>