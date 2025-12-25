<?php
include '../../include/koneksi.php';

// Tangkap data dari form
$nama       = mysqli_real_escape_string($koneksi, $_POST['nama']);
$nim        = mysqli_real_escape_string($koneksi, $_POST['nim']);
$angkatan   = mysqli_real_escape_string($koneksi, $_POST['angkatan']);
$no_hp      = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$jabatan    = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
$divisi     = mysqli_real_escape_string($koneksi, $_POST['divisi']);
$urutan     = mysqli_real_escape_string($koneksi, $_POST['urutan']);

// Set Password Default & Role
$password   = "nim123"; // Password default
$role       = "anggota"; // Default role

// Cek apakah NIM sudah ada (menghindari duplikat)
$cek_nim = mysqli_query($koneksi, "SELECT nim FROM anggota WHERE nim='$nim'");
if(mysqli_num_rows($cek_nim) > 0){
    echo "<script>alert('NIM sudah terdaftar! Gunakan NIM lain.'); window.location='tambah.php';</script>";
    exit;
}

// Upload Foto
$rand = rand();
$filename = $_FILES['foto']['name'];
$nama_foto = "default.jpg"; // Foto default jika tidak upload

if ($filename != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'webp');
    $x = explode('.', $filename);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 2097152) { // Max 2MB
            $nama_foto = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/uploads/anggota/' . $nama_foto);
        } else {
            echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB.'); window.location='tambah.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Format foto tidak valid! Gunakan JPG/PNG/WEBP.'); window.location='tambah.php';</script>";
        exit;
    }
}

// Insert Data ke Database
$query = "INSERT INTO anggota (nim, nama, angkatan, no_hp, jabatan, divisi, foto, password, role, urutan) 
          VALUES ('$nim', '$nama', '$angkatan', '$no_hp', '$jabatan', '$divisi', '$nama_foto', '$password', '$role', '$urutan')";

$simpan = mysqli_query($koneksi, $query);

if ($simpan) {
    echo "<script>alert('Data anggota berhasil ditambahkan!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan data!'); window.location='tambah.php';</script>";
}
?>