<?php 
// FILE: sambutan.php
include 'includes/koneksi.php'; 

// Ambil data Ketua Himpunan
$ketua = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE '%Ketua Himpunan%' LIMIT 1"));
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sambutan Bupati - HIMASI UIN Suska Riau</title>
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
                            <a href="sambutan.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 bg-blue-50">Sambutan Bupati</a>
                            <a href="tentang.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Visi & Misi</a>
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
                    <a href="sambutan.php" class="block px-6 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded">Sambutan Bupati</a>
                    <a href="tentang.php" class="block px-6 py-2 text-sm text-gray-600">Visi & Misi</a>
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
                    Profil Pimpinan
                </span>
            </div>
            <h1 class="fade-in-up delay-100 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight">
                Sambutan Bupati HIMASI
            </h1>
            <p class="fade-in-up delay-200 text-lg text-gray-300 max-w-2xl mx-auto">
                Pesan dan harapan untuk masa depan Himpunan Mahasiswa Sistem Informasi periode 2025-2026.
            </p>
        </div>
    </div>


    <div class="container mx-auto px-6 py-20 max-w-6xl">
        <div class="flex flex-col md:flex-row gap-16 items-start">

            <div class="w-full md:w-5/12 sticky top-28 fade-in-up delay-100">
                <div class="relative group">
                    <div class="absolute -top-4 -left-4 w-full h-full bg-blue-100 rounded-2xl transform -rotate-3 transition group-hover:rotate-0"></div>
                    <div class="absolute -bottom-4 -right-4 w-full h-full bg-yellow-100 rounded-2xl transform rotate-3 transition group-hover:rotate-0"></div>
                    
                    <div class="relative bg-white p-2 rounded-2xl shadow-xl overflow-hidden">
                        <img src="assets/img/pengurus/<?php echo $ketua['foto'] ?? 'default.jpg'; ?>" 
                             class="w-full h-auto object-cover rounded-xl transform transition duration-500 group-hover:scale-105"
                             onerror="this.src='https://via.placeholder.com/400x500?text=Foto+Bupati'">
                        
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent p-8 pt-20">
                            <h3 class="text-white text-2xl font-bold leading-tight">
                                <?php echo $ketua['nama_lengkap'] ?? 'Nama Bupati'; ?>
                            </h3>
                            <p class="text-yellow-400 font-medium mt-1 tracking-wide">Bupati HIMASI 2025/2026</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-blue-900 text-white p-8 rounded-2xl relative overflow-hidden shadow-lg">
                    <i class="fas fa-quote-left text-6xl text-blue-800 absolute -top-2 -left-2 opacity-50"></i>
                    <p class="relative z-10 italic text-center font-medium leading-relaxed">
                        "Pemimpin bukanlah orang yang hanya memberi perintah, tetapi orang yang mampu menginspirasi perubahan nyata."
                    </p>
                </div>
            </div>

            <div class="w-full md:w-7/12 text-gray-700 leading-loose text-lg fade-in-up delay-200">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-yellow-500 pl-6">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh
                </h2>
                
                <div class="space-y-6 text-justify">
                    <p>
                        Salam sejahtera bagi kita semua, Om Swastiastu, Namo Buddhaya, Salam Kebajikan.
                    </p>
                    <p>
                        Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya kita masih diberi kesempatan untuk berkarya dan berkontribusi bagi almamater tercinta. Selamat datang di website resmi <strong>Himpunan Mahasiswa Sistem Informasi (HIMASI)</strong> UIN Suska Riau.
                    </p>
                    <p>
                        Di era digital yang berkembang sangat pesat ini, mahasiswa Sistem Informasi memegang peranan kunci sebagai agen perubahan teknologi. HIMASI hadir bukan hanya sebagai wadah organisasi, tetapi sebagai rumah bagi aspirasi, inovasi, dan kreativitas seluruh mahasiswa.
                    </p>
                    
                    <div class="bg-blue-50 border-l-4 border-blue-600 p-6 my-8 rounded-r-xl">
                        <p class="font-bold text-blue-900 italic text-xl mb-2">"Kolaborasi & Inovasi"</p>
                        <p class="text-sm text-blue-800">
                            Adalah semangat yang kami usung untuk menciptakan lingkungan inklusif, di mana setiap anggota dapat mengembangkan potensi akademis maupun non-akademisnya secara maksimal.
                        </p>
                    </div>

                    <p>
                        Melalui berbagai program kerja unggulan seperti <em>Bumasi</em>, <em>Fortasi</em>, dan pelatihan teknologi, kami siap mencetak kader-kader yang kompeten dan berakhlak mulia. Saya mengajak seluruh rekan-rekan mahasiswa untuk aktif berpartisipasi dan bersinergi.
                    </p>
                    <p>
                        Kritik dan saran yang membangun selalu kami nantikan demi kemajuan himpunan kita tercinta. Terima kasih atas dukungan dan kepercayaannya. Mari melangkah bersama menuju HIMASI yang lebih gemilang.
                    </p>

                    <div class="pt-8 mt-8 border-t border-gray-100">
                        <p class="font-bold text-gray-900">
                            Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                        </p>
                        <p class="mt-2 font-bold text-blue-600 uppercase tracking-widest">
                            SISTEM INFORMASI! TINDAKAN NYATA!
                        </p>
                    </div>

                    <div class="mt-8">
                        <div class="text-sm text-gray-500 italic mb-2">Tertanda,</div>
                        <div class="text-2xl font-signature text-gray-900 font-bold"><?php echo $ketua['nama_lengkap'] ?? 'Bivandira Aurel'; ?></div>
                        <div class="text-sm text-gray-500">Bupati HIMASI UIN Suska Riau</div>
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
                    <p class="text-gray-400 leading-relaxed max-w-sm mb-6">
                        Mewujudkan mahasiswa Sistem Informasi yang unggul dalam teknologi, berjiwa pemimpin, dan menjunjung tinggi nilai-nilai keislaman.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Tautan Cepat</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="index.php" class="hover:text-blue-400 transition">Beranda</a></li>
                        <li><a href="tentang.php" class="hover:text-blue-400 transition">Visi & Misi</a></li>
                        <li><a href="struktur.php" class="hover:text-blue-400 transition">Struktur Organisasi</a></li>
                        <li><a href="index.php#berita" class="hover:text-blue-400 transition">Berita Terkini</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-500"></i>
                            <span>Gedung Fakultas Sains & Teknologi, UIN Suska Riau.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-blue-500"></i>
                            <span>himasi@uin-suska.ac.id</span>
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