<?php
// FILE: admin/berita/proses_tambah.php
session_start();
include '../../includes/koneksi.php';

if(isset($_POST['simpan'])){
    // 1. TANGKAP DATA DARI FORM
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $hari     = mysqli_real_escape_string($koneksi, $_POST['hari']); // Menangkap input Hari
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $tanggal  = $_POST['tanggal'];
    
    // 2. PROSES UPLOAD GAMBAR
    $gambar   = $_FILES['gambar']['name'];
    $tmp      = $_FILES['gambar']['tmp_name'];
    $ukuran   = $_FILES['gambar']['size'];
    
    // Cek apakah ada gambar
    if($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'webp');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        
        // Rename gambar agar unik
        $new_img = date('dmYHis').'-'.str_replace(' ', '-', $gambar);
        $path    = "../../assets/img/".$new_img;

        // Validasi Ekstensi
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            // Validasi Ukuran (Max 5MB)
            if($ukuran < 5048000){ 
                
                // Pindahkan File
                if(move_uploaded_file($tmp, $path)){
                    
                    // QUERY INSERT DATABASE (Pastikan urutan kolom sesuai)
                    $query = "INSERT INTO berita (judul, kategori, hari, isi_berita, tanggal, gambar) 
                              VALUES ('$judul', '$kategori', '$hari', '$isi', '$tanggal', '$new_img')";
                    
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        // TAMPILKAN ERROR JIKA GAGAL QUERY
                        die("Query Gagal: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                    } else {
                        echo "<script>alert('Berita Berhasil Ditambahkan!'); window.location='index.php';</script>";
                    }

                } else {
                    echo "<script>alert('Gagal Upload Gambar ke Folder! Cek permission folder assets/img.'); window.location='tambah.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Gambar Terlalu Besar! (Max 5MB)'); window.location='tambah.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi Gambar Tidak Diperbolehkan! Gunakan JPG, PNG, atau WEBP.'); window.location='tambah.php';</script>";
        }
    } else {
        echo "<script>alert('Silakan Pilih Gambar Terlebih Dahulu!'); window.location='tambah.php';</script>";
    }
}
?>