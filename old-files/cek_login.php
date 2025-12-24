<?php 
session_start();
include 'includes/koneksi.php';
 
// 1. Ubah 'username' jadi 'nim' disini
$nim = $_POST['nim']; 
$password = md5($_POST['password']); 
 
// 2. Ubah query SQL-nya juga (Ganti 'username' jadi 'nim')
// Perhatikan bagian: where nim='$nim'
$data = mysqli_query($koneksi, "select * from users where nim='$nim' and password='$password'") or die(mysqli_error($koneksi));
 
$cek = mysqli_num_rows($data);
 
if($cek > 0){
    $row = mysqli_fetch_assoc($data);

    // 3. Simpan session juga pakai nim atau nama
	$_SESSION['nim'] = $nim;
    $_SESSION['nama'] = $row['nama_lengkap']; // Pastikan kolom 'nama_lengkap' ada di DB
	$_SESSION['role'] = $row['role'];
	$_SESSION['status'] = "login";
 
    // ... Sisa kode ke bawah sama (header location dst) ...
 
	// Cek jika user login sebagai admin
	if($row['role']=="admin"){
        // Alihkan ke halaman dashboard admin
		header("location:admin/index.php");
 
	// Cek jika user login sebagai anggota
	}else if($row['role']=="anggota"){
        // Alihkan ke halaman dashboard anggota
		header("location:user/index.php");
	}
 
}else{
	header("location:login.php?pesan=gagal");
}
?>