<?php
// FILE: admin/anggota/proses_tambah.php

// 1. Panggil koneksi database
include '../../includes/koneksi.php';

// 2. Tangkap data yang dikirim dari form
$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$jabatan  = $_POST['jabatan'];
$divisi   = $_POST['divisi'];
// Password dienkripsi dengan MD5 biar aman
$password = md5($_POST['password']); 
// Role otomatis diset sebagai 'anggota'
$role     = 'anggota'; 

// 3. Cek Duplikat: Apakah NIM ini sudah terdaftar sebelumnya?
$cek_nim = mysqli_query($koneksi, "SELECT * FROM users WHERE nim='$nim'");
if(mysqli_num_rows($cek_nim) > 0){
    // Jika NIM sudah ada, tolak dan kembalikan ke form
    echo "<script>
            alert('GAGAL! NIM $nim sudah terdaftar. Mohon cek kembali.'); 
            window.location='tambah.php';
          </script>";
    exit; // Berhenti di sini, jangan lanjut ke bawah
}

// 4. Logika Upload Foto
$foto_nama = $_FILES['foto']['name'];
$foto_tmp  = $_FILES['foto']['tmp_name'];

// Jika user mengupload foto (namanya tidak kosong)
if($foto_nama != "") {
    // Beri nama file unik (Format: NIM_NamaFileAsli) supaya tidak bentrok
    $nama_file_baru = $nim . "_" . $foto_nama;
    
    // Tentukan folder tujuan penyimpanan
    // Naik 2 folder (../../) lalu masuk ke assets/img/pengurus/
    $folder_tujuan = "../../assets/img/pengurus/" . $nama_file_baru;

    // Coba pindahkan file dari folder sementara ke folder tujuan
    if(move_uploaded_file($foto_tmp, $folder_tujuan)){
        $foto_fix = $nama_file_baru;
    } else {
        echo "<script>
                alert('Gagal mengupload foto! Pastikan folder assets/img/pengurus sudah dibuat.'); 
                window.location='tambah.php';
              </script>";
        exit;
    }
} else {
    // Jika tidak upload foto, pakai foto default
    $foto_fix = "default.jpg"; 
}

// 5. Simpan ke Database
$query = "INSERT INTO users (nim, nama_lengkap, jabatan, divisi, foto, password, role) 
          VALUES ('$nim', '$nama', '$jabatan', '$divisi', '$foto_fix', '$password', '$role')";

// Eksekusi Query
if(mysqli_query($koneksi, $query)){
    // Jika berhasil
    echo "<script>
            alert('Berhasil! Data Anggota Telah Disimpan.'); 
            window.location='index.php';
          </script>";
} else {
    // Jika gagal (misal koneksi putus atau query salah)
    echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
}
?>