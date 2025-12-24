<?php
session_start();
include 'includes/koneksi.php';

if(isset($_POST['login'])){
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // 1. Cek apakah NIM ada di database
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE nim='$nim'");
    
    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_assoc($query);

        // 2. VERIFIKASI PASSWORD DENGAN BCRYPT
        // password_verify(password_inputan, hash_dari_database)
        if(password_verify($password, $data['password'])){

            // 3. Cek Role
            if($data['role'] == 'admin'){
                $_SESSION['status'] = "login";
                $_SESSION['role'] = "admin";
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama_lengkap'];
                
                echo "<script>alert('Login Berhasil! Selamat Datang Admin.'); window.location='admin/index.php';</script>";
            } else {
                echo "<script>alert('Login Gagal! Akun Anda bukan Admin.');</script>";
            }

        } else {
            echo "<script>alert('Login Gagal! Password salah.');</script>";
        }
    } else {
        echo "<script>alert('Login Gagal! NIM tidak ditemukan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - HIMASI UIN Suska</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .login-bg {
            background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2029&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        .bg-overlay {
            background: linear-gradient(to bottom right, rgba(14, 67, 167, 0.8), rgba(17, 24, 39, 0.9));
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .glass-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
        .glass-input::placeholder { color: rgba(255, 255, 255, 0.6); }
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
            outline: none;
        }
    </style>
</head>
<body class="login-bg h-screen relative overflow-hidden flex items-center justify-center">

    <div class="absolute inset-0 bg-overlay"></div>
    <div class="absolute top-10 left-10 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-1000"></div>

    <div class="glass-card relative z-10 p-10 rounded-3xl shadow-2xl w-full max-w-md mx-4 border-t-4 border-blue-500">
        <div class="text-center mb-8">
            <img src="assets/img/Logo-SIF.jpg" alt="Logo HIMASI" class="h-20 mx-auto mb-4 rounded-full border-2 border-blue-400/50 p-1 shadow-lg filter brightness-110">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Admin Login</h2>
            <p class="text-blue-200 text-sm mt-2">Silakan masuk untuk mengelola sistem.</p>
        </div>

        <form action="" method="POST" class="space-y-6">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-user text-blue-300"></i>
                </div>
                <input type="text" name="nim" placeholder="Masukkan NIM" required 
                       class="glass-input w-full pl-12 pr-4 py-3.5 rounded-xl transition-all duration-300">
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-blue-300"></i>
                </div>
                <input type="password" name="password" placeholder="Masukkan Password" required 
                       class="glass-input w-full pl-12 pr-4 py-3.5 rounded-xl transition-all duration-300">
            </div>

            <div class="flex items-center justify-between text-sm text-blue-200">
                <label class="flex items-center cursor-pointer hover:text-white transition">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500 rounded border-gray-300 bg-white/10 focus:ring-blue-500 transition mr-2">
                    <span>Ingat Saya</span>
                </label>
                <a href="#" class="hover:text-white hover:underline transition">Lupa Password?</a>
            </div>

            <button type="submit" name="login" 
                    class="w-full py-3.5 px-6 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold text-lg rounded-xl shadow-lg transform hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                MASUK SEKARANG <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </button>
        </form>

        <div class="mt-8 text-center text-blue-200 text-sm">
            <a href="index.php" class="inline-flex items-center hover:text-white transition gap-2 group">
                <i class="fas fa-chevron-left text-xs group-hover:-translate-x-1 transition"></i> Kembali ke Beranda Utama
            </a>
        </div>
    </div>

</body>
</html>