<?php 
session_start();
session_destroy(); // Hapus semua sesi
header("location:login.php"); // Kembalikan ke halaman login
?>