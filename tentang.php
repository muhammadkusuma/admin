<?php 
// FILE: tentang.php
include 'includes/koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi - HIMASI UIN Suska Riau</title>
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
        .delay-300 { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Glassmorphism Navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Card Hover Effect */
        .misi-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .misi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            border-left-color: #F59E0B; /* Kuning */
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
                            <a href="tentang.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 bg-blue-50">Visi & Misi</a>
                            <a href="sejarah.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Sejarah Singkat</a>
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
                    <a href="tentang.php" class="block px-6 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded">Visi & Misi</a>
                    <a href="sejarah.php" class="block px-6 py-2 text-sm text-gray-600">Sejarah Singkat</a>
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
                    Landasan Organisasi
                </span>
            </div>
            <h1 class="fade-in-up delay-100 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight">
                Visi & Misi
            </h1>
            <p class="fade-in-up delay-200 text-lg text-gray-300 max-w-2xl mx-auto">
                Arah gerak dan tujuan Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.
            </p>
        </div>
    </div>


    <div class="container mx-auto px-6 py-16 -mt-20 relative z-20 fade-in-up delay-300">
        <div class="bg-white rounded-3xl shadow-2xl p-10 md:p-14 text-center border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 via-yellow-400 to-blue-600"></div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>
            
            <span class="inline-block bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-6">Visi Kami</span>
            
            <h2 class="text-xl md:text-3xl font-serif italic text-gray-800 leading-relaxed max-w-4xl mx-auto relative z-10">
                <span class="text-6xl text-blue-200 absolute -top-8 -left-4 font-sans opacity-50">“</span>
                Menjadikan HIMASI sebagai organisasi mahasiswa yang inspiratif, kolaboratif, dan berorientasi pada pengembangan kreativitas serta inovasi, dengan menjunjung tinggi nilai kekeluargaan dalam membangun himpunan mahasiswa Sistem Informasi yang solid dan unggul.
                <span class="text-6xl text-blue-200 absolute -bottom-12 -right-4 font-sans opacity-50">”</span>
            </h2>
        </div>
    </div>


    <div class="bg-blue-50/50 py-20">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Misi HIMASI</h2>
                <div class="w-16 h-1.5 bg-blue-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid gap-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 flex items-start gap-6 misi-card">
                    <div class="bg-blue-100 text-blue-700 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-xl flex-shrink-0 shadow-inner">1</div>
                    <p class="text-gray-700 text-lg leading-relaxed pt-2">
                        Memperkuat sinergi antara mahasiswa, program studi, dan alumni Sistem Informasi melalui kolaborasi yang berkelanjutan.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 flex items-start gap-6 misi-card">
                    <div class="bg-blue-100 text-blue-700 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-xl flex-shrink-0 shadow-inner">2</div>
                    <p class="text-gray-700 text-lg leading-relaxed pt-2">
                        Mengoptimalkan HIMASI sebagai wadah aspirasi mahasiswa untuk mendorong pengembangan potensi dan kreativitas di berbagai bidang.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 flex items-start gap-6 misi-card">
                    <div class="bg-blue-100 text-blue-700 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-xl flex-shrink-0 shadow-inner">3</div>
                    <p class="text-gray-700 text-lg leading-relaxed pt-2">
                        Membangun budaya kebanggaan dan kecintaan terhadap program studi Sistem Informasi dengan pendekatan yang relevan dan inklusif.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 flex items-start gap-6 misi-card">
                    <div class="bg-blue-100 text-blue-700 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-xl flex-shrink-0 shadow-inner">4</div>
                    <p class="text-gray-700 text-lg leading-relaxed pt-2">
                        Meningkatkan partisipasi aktif mahasiswa dalam kegiatan akademik, non-akademik, dan sosial yang mendukung perkembangan diri dan himpunan.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 flex items-start gap-6 misi-card">
                    <div class="bg-blue-100 text-blue-700 w-12 h-12 rounded-xl flex items-center justify-center font-bold text-xl flex-shrink-0 shadow-inner">5</div>
                    <p class="text-gray-700 text-lg leading-relaxed pt-2">
                        Mewujudkan lingkungan HIMASI yang terbuka, profesional, dan mampu beradaptasi dengan perkembangan zaman.
                    </p>
                </div>

            </div>
        </div>
    </div>


    <div class="bg-gray-900 text-white py-24 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

        <div class="container mx-auto px-6 relative z-10">
            
            <div class="mb-8">
                <i class="fas fa-quote-left text-4xl text-blue-500 opacity-50 mb-6 block"></i>
                <h3 class="text-xl md:text-3xl font-light italic leading-relaxed max-w-4xl mx-auto text-blue-50">
                    "Tetap berpegang teguh pada Tindakan Nyata dengan Berkontribusi Nyata, Karna hal yang nyata dibuktikan dengan Tindakan bukan hanya sekedar kata-kata."
                </h3>
            </div>

            <div class="border-t border-gray-700 pt-10 max-w-2xl mx-auto mt-12">
                <p class="text-xs tracking-[0.4em] text-gray-400 mb-4 uppercase font-bold">Jargon Kebanggaan</p>
                <h2 class="text-4xl md:text-6xl font-extrabold tracking-wide uppercase drop-shadow-2xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-200">Sistem Informasi</span><br>
                    <span class="text-yellow-400">Tindakan Nyata!</span>
                </h2>
            </div>

        </div>
    </div>


    <footer class="bg-gray-900 text-white pt-20 pb-10 border-t border-gray-800">
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