<?php
session_start();
include '../includes/koneksi.php';

// Cek status login & role
if($_SESSION['status'] != "login" || $_SESSION['role'] != "admin"){
    header("location:../login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* BACKGROUND UTAMA (Sama dengan Login) */
        .admin-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%); /* Biru Tua ke Hitam Elegan */
            min-height: 100vh;
            color: white;
        }

        /* CARD GLASSMORPHISM */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem; /* Rounded-3xl */
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* NAVBAR GLASS */
        .glass-nav {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* BUTTONS */
        .btn-action {
            display: inline-block;
            width: 100%;
            padding: 0.75rem;
            border-radius: 1rem;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s;
        }
    </style>
</head>
<body class="admin-bg">

    <nav class="glass-nav fixed w-full z-50 top-0 left-0 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center border border-white/20">
                    <i class="fas fa-user-shield text-blue-300"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold tracking-wide">ADMIN</h1>
                    <p class="text-[10px] text-blue-300 uppercase tracking-wider">HIMASI UIN Suska Riau</p>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden md:block text-right">
                    <span class="block text-sm font-semibold text-white"><?php echo $_SESSION['nama']; ?></span>
                    <span class="block text-xs text-blue-300">Administrator Medkominfo</span>
                </div>
                <a href="logout.php" class="px-5 py-2 rounded-full bg-red-500/20 text-red-300 hover:bg-red-500 hover:text-white border border-red-500/30 transition text-sm font-bold flex items-center gap-2">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>

        </div>
    </nav>


    <div class="container mx-auto px-6 pt-32 pb-12">

        <div class="glass-card p-8 mb-10 flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full mix-blend-overlay filter blur-3xl opacity-20 -translate-y-1/2 translate-x-1/2"></div>
            
            <div class="relative z-10 mb-6 md:mb-0">
                <h2 class="text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h2>
                <p class="text-blue-200">Kelola konten website, anggota, dan acara HIMASI dengan mudah dari sini.</p>
            </div>
            <div class="relative z-10 flex gap-3">
                <button class="px-6 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-sm font-bold transition">
                    <i class="fas fa-cog mr-2"></i> Pengaturan
                </button>
                <a href="../index.php" target="_blank" class="px-6 py-3 bg-blue-600 hover:bg-blue-500 shadow-lg shadow-blue-500/30 rounded-xl text-sm font-bold transition">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Website
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="glass-card p-6 flex flex-col h-full group">
                <div class="w-14 h-14 rounded-2xl bg-blue-500/20 text-blue-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition border border-blue-500/30">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Berita</h3>
                <p class="text-sm text-gray-400 mb-6 flex-grow">Update informasi & artikel terbaru seputar kampus.</p>
                <a href="berita/index.php" class="btn-action bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 shadow-lg shadow-blue-900/50">
                    Kelola Berita <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <div class="glass-card p-6 flex flex-col h-full group">
                <div class="w-14 h-14 rounded-2xl bg-yellow-500/20 text-yellow-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition border border-yellow-500/30">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Anggota</h3>
                <p class="text-sm text-gray-400 mb-6 flex-grow">Data pengurus, struktur organisasi, dan user.</p>
                <a href="anggota/index.php" class="btn-action bg-gradient-to-r from-yellow-600 to-yellow-800 hover:from-yellow-500 hover:to-yellow-700 shadow-lg shadow-yellow-900/50 text-white">
                    Kelola Anggota <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <div class="glass-card p-6 flex flex-col h-full group">
                <div class="w-14 h-14 rounded-2xl bg-purple-500/20 text-purple-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition border border-purple-500/30">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Acara</h3>
                <p class="text-sm text-gray-400 mb-6 flex-grow">Agenda kegiatan, proker, dan dokumentasi.</p>
                <a href="acara/index.php" class="btn-action bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700 shadow-lg shadow-purple-900/50">
                    Kelola Acara <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <div class="glass-card p-6 flex flex-col h-full group">
                <div class="w-14 h-14 rounded-2xl bg-green-500/20 text-green-300 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition border border-green-500/30">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Prestasi</h3>
                <p class="text-sm text-gray-400 mb-6 flex-grow">Data pencapaian dan kejuaraan mahasiswa.</p>
                <a href="prestasi/index.php" class="btn-action bg-gradient-to-r from-green-600 to-green-800 hover:from-green-500 hover:to-green-700 shadow-lg shadow-green-900/50">
                    Kelola Prestasi <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

        </div>

        <div class="mt-12 text-center text-xs text-blue-400/50">
            &copy; 2025 Administrator System HIMASI. All Rights Reserved.
        </div>

    </div>

</body>
</html>