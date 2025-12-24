<?php 
// FILE: struktur.php
include 'includes/koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - HIMASI UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Animasi Fade In Up */
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
        .member-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.15);
        }

        /* Modal Lightbox */
        #imageModal { backdrop-filter: blur(5px); }
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
                            <a href="sejarah.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Sejarah Singkat</a>
                            <a href="struktur.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 bg-blue-50">Struktur Organisasi</a>
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
                    <a href="sejarah.php" class="block px-6 py-2 text-sm text-gray-600">Sejarah Singkat</a>
                    <a href="struktur.php" class="block px-6 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded">Struktur Organisasi</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="relative h-[60vh] min-h-[400px] flex items-center justify-center bg-fixed bg-center bg-cover" style="background-image: url('assets/img/BG.jpg');">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 via-gray-900/70 to-gray-900/90"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="fade-in-up">
                <span class="inline-block py-1 px-4 rounded-full border border-white/30 bg-white/10 backdrop-blur-md text-blue-100 text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-4">
                    Kabinet 2024/2025
                </span>
            </div>
            <h1 class="fade-in-up delay-100 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 leading-tight">
                Struktur Organisasi
            </h1>
            <p class="fade-in-up delay-200 text-lg text-gray-300 max-w-2xl mx-auto">
                Mengenal lebih dekat wajah-wajah penggerak Himpunan Mahasiswa Sistem Informasi.
            </p>
        </div>
    </div>


    <div class="container mx-auto px-4 py-20 max-w-7xl">
        
        <?php
        // Query Database
        $ketua   = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE '%Ketua Himpunan%' LIMIT 1"));
        $wakil   = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE '%Wakil Ketua%' LIMIT 1"));
        $q_sekretaris = mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE '%Sekretaris%' ORDER BY jabatan DESC");
        $q_bendahara  = mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE '%Bendahara%' ORDER BY jabatan DESC");
        $q_kadiv      = mysqli_query($koneksi, "SELECT * FROM users WHERE jabatan LIKE 'Kepala%' OR jabatan LIKE 'Koordinator%' ORDER BY divisi ASC");
        
        // FUNGSI KARTU MODERN
        function buat_kartu($data, $border='border-blue-500', $bg_badge='bg-blue-50 text-blue-700', $delay=0) {
            if(!$data) return;
            ?>
            <div class="bg-white rounded-2xl shadow-lg border-b-4 <?php echo $border; ?> member-card w-full max-w-[280px] p-6 text-center relative overflow-hidden fade-in-up group" style="animation-delay: <?php echo $delay; ?>s;">
                
                <div class="w-32 h-32 mx-auto mb-5 rounded-full overflow-hidden border-4 border-gray-50 shadow-md relative group">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition z-10 pointer-events-none"></div>
                    
                    <img src="assets/img/pengurus/<?php echo $data['foto']; ?>" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500 cursor-zoom-in" 
                         onclick="bukaModal(this.src)"
                         onerror="this.src='https://via.placeholder.com/150'">
                </div>
                
                <h3 class="text-lg font-bold text-gray-800 leading-tight mb-2 line-clamp-2 min-h-[50px] flex items-center justify-center">
                    <?php echo $data['nama_lengkap']; ?>
                </h3>
                
                <div class="<?php echo $bg_badge; ?> py-1.5 px-4 rounded-full inline-block mt-1 text-xs font-bold uppercase tracking-wider">
                    <?php echo $data['jabatan']; ?>
                </div>
                
                <?php if(!empty($data['divisi']) && $data['divisi'] != '-') { ?>
                    <p class="text-xs text-gray-400 mt-3 font-medium">Divisi <?php echo $data['divisi']; ?></p>
                <?php } ?>
            </div>
            <?php
        }
        ?>

        <div class="mb-16">
            <h2 class="text-center text-sm font-bold text-gray-400 mb-8 uppercase tracking-[0.3em] fade-in-up">Pimpinan Himpunan</h2>
            <div class="flex flex-wrap justify-center gap-8 md:gap-12">
                <?php buat_kartu($ketua, 'border-yellow-500', 'bg-yellow-100 text-yellow-800', 0.1); ?>
                <?php buat_kartu($wakil, 'border-yellow-500', 'bg-yellow-100 text-yellow-800', 0.2); ?>
            </div>
        </div>

        <div class="border-b border-gray-200 w-1/3 mx-auto mb-16 opacity-50"></div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <div>
                <h2 class="text-center text-sm font-bold text-gray-400 mb-8 uppercase tracking-[0.3em] fade-in-up">Kesekretariatan</h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <?php 
                    $d = 0.3;
                    while($sek = mysqli_fetch_array($q_sekretaris)) { 
                        buat_kartu($sek, 'border-blue-500', 'bg-blue-100 text-blue-800', $d); 
                        $d += 0.1;
                    } ?>
                </div>
            </div>

            <div>
                <h2 class="text-center text-sm font-bold text-gray-400 mb-8 uppercase tracking-[0.3em] fade-in-up">Kebendaharaan</h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <?php 
                    $d = 0.3;
                    while($ben = mysqli_fetch_array($q_bendahara)) { 
                        buat_kartu($ben, 'border-green-500', 'bg-green-100 text-green-800', $d); 
                        $d += 0.1;
                    } ?>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-200 w-1/3 mx-auto mb-16 opacity-50"></div>

        <div class="mb-20">
            <h2 class="text-center text-sm font-bold text-gray-400 mb-10 uppercase tracking-[0.3em] fade-in-up">Koordinator Divisi</h2>
            
            <div class="flex flex-wrap justify-center gap-6 md:gap-8">
                <?php 
                $d = 0.5;
                while($kadiv = mysqli_fetch_array($q_kadiv)) { 
                    buat_kartu($kadiv, 'border-purple-500', 'bg-purple-100 text-purple-800', $d);
                    $d += 0.1;
                } ?>
            </div>
        </div>

    </div>

    <div id="imageModal" class="fixed inset-0 z-[100] hidden bg-gray-900/95 flex items-center justify-center p-4 transition-opacity duration-300" onclick="tutupModal()">
        <button class="absolute top-5 right-5 text-white/70 hover:text-white text-5xl font-light focus:outline-none">&times;</button>
        
        <img id="modalImg" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transform scale-95 transition duration-300" src="" onclick="event.stopPropagation()">
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
        // Navbar Mobile
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => { menu.classList.toggle('hidden'); });

        // Lightbox Logic
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImg');

        function bukaModal(src) {
            modalImg.src = src;
            modal.classList.remove('hidden');
            // Menunggu sedikit agar transisi scale bisa terlihat
            setTimeout(() => { 
                modalImg.classList.remove('scale-95'); 
                modalImg.classList.add('scale-100'); 
            }, 10);
        }

        function tutupModal() {
            modalImg.classList.remove('scale-100');
            modalImg.classList.add('scale-95');
            // Menunggu animasi scale selesai baru di-hidden
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
        
        // Fitur tutup dengan tombol ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                tutupModal();
            }
        });
    </script>

</body>
</html>