<?php
// FILE: admin/logout.php
session_start();

// Menghapus semua session yang tersimpan
session_destroy();

// Menghapus variabel session spesifik (untuk memastikan bersih)
unset($_SESSION['status']);
unset($_SESSION['role']);
unset($_SESSION['id_user']);
unset($_SESSION['nama']);

// Redirect (mengalihkan) kembali ke halaman Login di folder luar
// "../login.php" artinya mundur satu folder ke belakang
echo "<script>
        alert('Anda telah berhasil logout.');
        window.location = '../login.php'; 
      </script>";
?>