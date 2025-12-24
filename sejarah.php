<?php 
// FILE: sejarah.php
include 'includes/koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Singkat - HIMASI UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Animasi Text Muncul */
        .fade-in-up {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Glassmorphism Navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Style Logo Filosofis */
        .earth-icon {
            color: #1E40AF; /* Biru Tua */
            font-size: 8rem;
            opacity: 0.9;
            filter: drop-shadow(0 10px 10px rgba(30, 64, 175, 0.3));
        }
        .knowledge-icon {
            color: #F59E0B; /* Kuning Emas */
            font-size: 4rem;
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 8px 20px;
            border-radius: 50%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="glass-nav fixed top-0 z-50 w-full transition-all duration-300 shadow-sm"> 
        <div class="w-full px-4 md:px-8 py-3">
            <div class="flex justify-between items-center">
                
                <a class="flex items-center gap-3 group" href="index.php">
                    <img src="assets/img/Logo Universitas Islam Negeri Sultan Syarif Kasim Riau (UIN Suska Riau).png" alt="UIN" class="h-10 w-auto group-hover:scale-110 transition">
                    <img src="assets/img/Logo-SIF.jpg" alt="HIMA" class="h-10 w-auto group-hover:scale-110 transition">
                    <div class="flex flex-col text-left">
                        <span class="font-extrabold text-xl leading-none text-blue-900 tracking-tight">HIMASI</span>
                        <span class="text-[10px] text-gray-500 font-bold tracking-widest uppercase">UIN Suska Riau</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center space-x-1"> 
                    <a href="index.php" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-full transition">Beranda</a>
                    <a href="index.php#berita" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Berita</a>
                    
                    <div class="relative group">
                        <button class="px-4 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded-full flex items-center gap-1 transition">
                            Profil <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="sambutan.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Sambutan Bupati</a>
                            <a href="tentang.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Visi & Misi</a>
                            <a href="sejarah.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 bg-blue-50">Sejarah Singkat</a>
                            <a href="struktur.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Struktur Organisasi</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">
                            Acara <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Bumasi</a>
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Fortasi</a>
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">KBM-SI</a>
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Latihan Kepemimpinan</a>
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Pendidikan Organisasi</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">
                            Kemahasiswaan <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Prestasi Mahasiswa</a>
                            <a href="#" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Kalender Akademik</a>
                        </div>
                    </div>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-800 hover:text-blue-600 focus:outline-none p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md border-t h-screen absolute w-full left-0 top-full">
            <div class="p-4 space-y-3">
                <a href="index.php" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Beranda</a>
                <a href="index.php#berita" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Berita</a>
                <div class="border-t border-gray-100 pt-2">
                    <span class="block px-4 text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Profil</span>
                    <a href="sambutan.php" class="block px-6 py-2 text-sm text-gray-600">Sambutan Bupati</a>
                    <a href="tentang.php" class="block px-6 py-2 text-sm text-gray-600">Visi & Misi</a>
                    <a href="sejarah.php" class="block px-6 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded">Sejarah Singkat</a>
                    <a href="struktur.php" class="block px-6 py-2 text-sm text-gray-600">Struktur Organisasi</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="relative h-[60vh] min-h-[400px] flex items-center justify-center bg-fixed bg-center bg-cover" style="background-image: url('assets/img/BG.jpg');">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 via-gray-900/70 to-gray-900/90"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="fade-in-up">
                <span class="inline-block py-1 px-4 rounded-full border border-white/30 bg-white/10 backdrop-blur-md text-blue-100 text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-4">
                    Profil Himpunan
                </span>
            </div>
            <h1 class="fade-in-up delay-100 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight">
                Sejarah Singkat
            </h1>
            <p class="fade-in-up delay-200 text-lg text-gray-300 max-w-2xl mx-auto">
                Perjalanan dan tonggak sejarah Program Studi Sistem Informasi UIN Suska Riau.
            </p>
        </div>
    </div>


    <div class="container mx-auto px-6 py-20 max-w-6xl fade-in-up delay-100">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            
            <div class="md:w-5/12 bg-gradient-to-br from-blue-50 to-white p-12 flex flex-col justify-center items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
                <div class="absolute bottom-0 right-0 w-32 h-32 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

                <div class="relative inline-block mb-10 mt-4 transform hover:scale-105 transition duration-500">
                    <i class="fas fa-globe-asia earth-icon"></i>
                    <i class="fas fa-book-open knowledge-icon"></i>
                </div>
                
                <h3 class="text-xl font-bold text-blue-900 mb-3">Filosofi Logo</h3>
                <p class="text-sm text-gray-600 italic font-medium leading-relaxed px-4">
                    "Bumi yang menaungi ilmu pengetahuan, melambangkan Sistem Informasi sebagai wadah global yang melindungi dan mengembangkan wawasan teknologi."
                </p>
            </div>

            <div class="md:w-7/12 p-10 md:p-14 leading-relaxed text-gray-700">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-1 bg-yellow-500 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-900">Awal Mula Berdiri</h2>
                </div>
                
                <div class="space-y-6 text-justify text-lg font-light">
                    <p>
                        Jurusan Sistem Informasi merupakan jurusan yang ke-5 pada Fakultas Sains dan Teknologi. Jurusan ini berdiri pada tanggal <strong>17 Juni 2002</strong> berdasarkan izin dari Direktur Jenderal Kelembagaan Agama Islam Departemen Agama RI Nomor: <strong>E/109/2002</strong>.
                    </p>
                    <p>
                        Perpanjangan Izin Penyelenggaraan Program Studi Sistem Informasi (S1) pada UIN Suska Riau ditandatangani oleh Dirjen Pendidikan Islam pada tanggal <strong>25 Juli 2007</strong>.
                    </p>
                    
                    <div class="bg-blue-50 p-6 rounded-xl border-l-4 border-blue-600 mt-8">
                        <div class="flex items-start gap-4">
                            <div class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div>
                                <p class="font-bold text-blue-900 mb-1">Status Akreditasi Saat Ini</p>
                                <p class="text-sm text-blue-800">
                                    Saat ini, Program Studi Sistem Informasi telah terakreditasi <strong>B</strong> berdasarkan keputusan BAN-PT No. <strong>2420/SK/BAN-PT/Akred/S/IX/2018</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <footer class="bg-gray-900 text-white pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-gray-800 pb-12">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-6 flex items-center gap-3">
                        <img src="assets/img/Logo-SIF.jpg" class="h-10 w-auto rounded-full bg-white p-1"> 
                        HIMASI UIN SUSKA
                    </h3>
                    <p class="text-gray-400 leading-relaxed max-w-sm">
                        Mewujudkan mahasiswa Sistem Informasi yang unggul dalam teknologi, berjiwa pemimpin, dan menjunjung tinggi nilai-nilai keislaman.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="index.php" class="hover:text-blue-400">Beranda</a></li>
                        <li><a href="tentang.php" class="hover:text-blue-400">Visi & Misi</a></li>
                        <li><a href="struktur.php" class="hover:text-blue-400">Struktur Organisasi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-500"></i>
                            <span>Fakultas Sains & Teknologi, UIN Suska Riau.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-gray-600 text-sm">
                &copy; 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });
    </script>

</body>
</html>