<?php
// FILE: index.php (Halaman Utama / Publik)
include 'includes/koneksi.php';

// --- 1. HITUNG STATISTIK ---
$q_user = mysqli_query($koneksi, "SELECT * FROM users");
$jml_anggota = ($q_user) ? mysqli_num_rows($q_user) : 0;

$q_berita_stat = mysqli_query($koneksi, "SELECT * FROM berita");
$jml_berita = ($q_berita_stat) ? mysqli_num_rows($q_berita_stat) : 0;

$q_acara_stat = mysqli_query($koneksi, "SELECT * FROM acara");
$jml_acara = ($q_acara_stat) ? mysqli_num_rows($q_acara_stat) : 0;

$jml_divisi = 8;

// --- 2. BACKGROUND HEADER ---
$bg_image = 'baground.JPG';
// $q_bg = mysqli_query($koneksi, "SELECT header_image FROM konfigurasi WHERE id = 1");
if ($q_bg && mysqli_num_rows($q_bg) > 0) {
    $data_bg = mysqli_fetch_array($q_bg);
    if (!empty($data_bg['header_image'])) {
        $bg_image = $data_bg['header_image'];
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa Sistem Informasi - UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Animasi Fade In Up */
        .fade-in-up { animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; transform: translateY(40px); }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        
        /* Animasi Bounce Slow */
        .bounce-slow { animation: bounce 2s infinite; }
        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(10px); } }
        
        /* Glass Navbar */
        .glass-nav { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="glass-nav fixed top-0 z-50 w-full transition-all duration-300 shadow-sm">
        <div class="w-full px-4 md:px-8 py-3">
            <div class="flex justify-between items-center">
                <a class="flex items-center gap-3 group" href="index.php">
                    <img src="assets/img/Logo Universitas Islam Negeri Sultan Syarif Kasim Riau (UIN Suska Riau).png" alt="Logo UIN" class="h-10 w-auto group-hover:scale-110 transition">
                    <img src="assets/img/Logo-SIF.jpg" alt="Logo HIMASI" class="h-10 w-auto group-hover:scale-110 transition">
                    <div class="flex flex-col text-left">
                        <span class="font-extrabold text-xl leading-none text-blue-900 tracking-tight">HIMASI</span>
                        <span class="text-[10px] text-gray-500 font-bold tracking-widest uppercase">UIN Suska Riau</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php" class="px-4 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded-full transition">Beranda</a>
                    
                    <div class="relative group">
                        <a href="berita.php" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">
                            Berita <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100 z-50">
                            <a href="berita.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 hover:bg-blue-50 border-b">Semua Berita</a>
                            <a href="berita.php?kategori=Berita Umum" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Berita Umum</a>
                            <a href="berita.php?kategori=Berita Mahasiswa" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Berita Mahasiswa</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">
                            Profil <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="sambutan.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Sambutan Bupati</a>
                            <a href="tentang.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Visi & Misi</a>
                            <a href="sejarah.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Sejarah Singkat</a>
                            <a href="struktur.php" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Struktur Organisasi</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <a href="acara.php" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">
                            Acara <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="acara.php" class="block px-5 py-2.5 text-sm font-bold text-blue-600 hover:bg-blue-50 border-b">Semua Agenda</a>
                            <a href="acara.php?kategori=PBAK" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">PBAK</a>
                            <a href="acara.php?kategori=Fortasi" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Fortasi</a>
                            <a href="acara.php?kategori=KBM-SI" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">KBM-SI</a>
                            <a href="acara.php?kategori=LK" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Latihan Kepemimpinan</a>
                            <a href="acara.php?kategori=PO" class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Pendidikan Organisasi</a>
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
                <a href="index.php" class="block px-4 py-3 font-bold text-blue-600 bg-blue-50 rounded-lg">Beranda</a>
                <a href="berita.php" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Berita</a>
                <a href="acara.php" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Acara</a>
            </div>
        </div>
    </nav>
    <div class="relative h-screen min-h-[600px] flex items-center justify-center bg-fixed bg-center bg-cover"
        style="background-image: url('assets/img/<?php echo $bg_image; ?>');">
        <div class="absolute inset-0 bg-gray-900/70"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="fade-in-up">
                <span class="inline-block py-1 px-4 rounded-full border border-white/30 bg-white/10 backdrop-blur-md text-blue-100 text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-6">
                    Official Website
                </span>
            </div>
            <h1 class="fade-in-up delay-100 text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl">
                Himpunan Mahasiswa <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">
                    Sistem Informasi
                </span>
            </h1>
            <p class="fade-in-up delay-200 text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Wadah aspirasi, inovasi, dan kreativitas mahasiswa UIN Suska Riau. Bersinergi mewujudkan teknologi masa depan.
            </p>
            <div class="fade-in-up delay-300 flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="struktur.php" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-[0_10px_20px_rgba(37,99,235,0.3)] transition transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                    Kenal Lebih Dekat <i class="fas fa-arrow-right"></i>
                </a>
                <a href="berita.php" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-bold rounded-full transition transform hover:-translate-y-1">
                    Baca Berita Terkini
                </a>
            </div>
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white/50 bounce-slow">
                <i class="fas fa-chevron-down text-2xl"></i>
            </div>
        </div>
    </div>


    <div class="relative -mt-16 z-20 px-4">
        <div class="container mx-auto max-w-5xl bg-white rounded-2xl shadow-2xl p-8 md:p-10 flex flex-wrap justify-between items-center text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
            <div class="w-full md:w-1/3 p-4">
                <div class="text-4xl font-extrabold text-blue-600 mb-1"><?php echo $jml_anggota; ?>+</div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Mahasiswa Aktif</div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="text-4xl font-extrabold text-yellow-500 mb-1"><?php echo $jml_divisi; ?></div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Divisi & Biro</div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="text-4xl font-extrabold text-cyan-500 mb-1"><?php echo $jml_acara; ?></div>
                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Agenda Terlaksana</div>
            </div>
        </div>
    </div>


    <div id="profil" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                    <div class="absolute bottom-0 -right-4 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                    <img src="assets/img/Logo-SIF.jpg" alt="Tentang HIMASI" class="relative z-10 rounded-2xl shadow-2xl rotate-3 hover:rotate-0 transition duration-500 w-full max-w-md mx-auto border-4 border-white">
                </div>
                <div class="w-full md:w-1/2">
                    <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Tentang HIMASI</h4>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                        Mengabdi dengan Hati, <br>Bergerak dengan <span class="text-blue-600 underline decoration-yellow-400 decoration-4 underline-offset-4">Teknologi</span>.
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Himpunan Mahasiswa Sistem Informasi (HIMASI) UIN Suska Riau berdiri sejak tahun 2002. Kami hadir sebagai rumah bagi mahasiswa untuk mengembangkan soft skill, kepemimpinan, dan kemampuan teknis di bidang IT.
                    </p>
                    <a href="struktur.php" class="inline-block bg-gray-900 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-800 transition shadow-lg">
                        Lihat Struktur Pengurus Lengkap →
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div id="sambutan" class="py-24 bg-blue-50/50 relative overflow-hidden border-t border-gray-100">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
                
                <div class="w-full md:w-3/5 order-2 md:order-1">
                    <div class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-blue-800 uppercase bg-blue-100 rounded-full">
                        <i class="fas fa-quote-left mr-2"></i>Leadership Message
                    </div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                        Sambutan Bupati HIMASI <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Periode 2025/2026</span>
                    </h2>
                    
                    <blockquote class="text-xl text-gray-700 font-medium italic border-l-4 border-blue-500 pl-6 mb-6 leading-relaxed">
                        "Mahasiswa Sistem Informasi bukan hanya tentang kode dan algoritma, tapi tentang menciptakan solusi yang bermanfaat bagi peradaban."
                    </blockquote>
                    
                    <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi HIMASI UIN Suska Riau. Website ini hadir sebagai wujud transparansi, informasi, dan wadah aspirasi bagi seluruh mahasiswa Sistem Informasi. Mari bersinergi untuk mewujudkan HIMASI yang unggul, berintegritas, dan inovatif.
                    </p>
                    
                    <div class="flex items-center gap-4">
                        <a href="sambutan.php" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 font-bold py-3.5 px-8 rounded-full transition shadow-lg shadow-blue-500/30 transform hover:-translate-y-1">
                            Baca Sambutan Lengkap <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        </div>
                </div>

                <div class="w-full md:w-2/5 order-1 md:order-2">
                    <div class="relative group">
                        <div class="absolute top-4 right-4 w-full h-full bg-blue-200 rounded-3xl -z-10 group-hover:translate-x-2 group-hover:-translate-y-2 transition duration-500"></div>
                        
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="assets/img/foto-bupati.jpg" 
                                 alt="Bupati HIMASI" 
                                 class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700"
                                 onerror="this.src='https://via.placeholder.com/400x500?text=Foto+Bupati'">
                            
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-6 pt-12">
                                <h3 class="text-white text-xl font-bold">Nama Bupati Anda</h3>
                                <p class="text-blue-300 text-sm font-medium uppercase tracking-wider">Bupati Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="visimisi" class="py-24 bg-white relative overflow-hidden border-t border-gray-100">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-blue-600 font-bold tracking-[0.2em] text-sm uppercase mb-2 block">Our Goals</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Visi & Misi</h2>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-12 border border-gray-100">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 relative min-h-[300px]">
                        <img src="assets/img/foto-bersama.jpg"
                            alt="Foto Bersama Pengurus HIMASI"
                            class="absolute inset-0 w-full h-full object-cover"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Space+Foto+Bersama'">
                        <div class="absolute inset-0 bg-blue-900/20"></div>
                    </div>

                    <div class="w-full md:w-1/2 p-10 md:p-14 flex flex-col justify-center bg-gradient-to-br from-white to-blue-50">
                        <div class="inline-block p-3 bg-blue-100 rounded-2xl w-max mb-6">
                            <i class="fas fa-eye text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Utama</h3>
                        <p class="text-xl text-gray-600 italic leading-relaxed font-medium">
                            "Menjadikan Himpunan Mahasiswa Sistem Informasi sebagai wadah yang unggul dalam pengembangan teknologi, berjiwa pemimpin, serta menjunjung tinggi nilai-nilai keislaman dan profesionalisme."
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-8 pl-4 border-l-4 border-blue-600">Misi Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 group">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 mb-2">Akademik & Riset</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengembangkan potensi akademik mahasiswa melalui riset teknologi dan kompetisi.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 group">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-yellow-500 group-hover:text-white transition">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 mb-2">Kepemimpinan</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Membentuk karakter pemimpin yang tangguh, disiplin, dan mampu bekerjasama.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 group">
                    <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4 group-hover:bg-cyan-500 group-hover:text-white transition">
                        <i class="fas fa-hands-helping text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 mb-2">Pengabdian</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Mengimplementasikan ilmu teknologi informasi untuk memecahkan masalah masyarakat.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 group">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-500 group-hover:text-white transition">
                        <i class="fas fa-star-and-crescent text-xl"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 mb-2">Nilai Keislaman</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Menanamkan nilai-nilai keislaman dalam setiap aktivitas organisasi.</p>
                </div>
            </div>
        </div>
    </div>


    <div id="agenda" class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Agenda Kegiatan</h2>
                    <p class="text-gray-500">Program kerja dan event yang akan datang.</p>
                </div>
                <a href="acara.php" class="hidden md:inline-block text-blue-600 font-bold hover:underline">Lihat Semua Agenda →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $q_acara = mysqli_query($koneksi, "SELECT * FROM acara ORDER BY tanggal_pelaksanaan DESC LIMIT 3");
                if ($q_acara && mysqli_num_rows($q_acara) > 0) {
                    while ($a = mysqli_fetch_array($q_acara)) {
                        $tgl = date('d', strtotime($a['tanggal_pelaksanaan']));
                        $bln = date('M', strtotime($a['tanggal_pelaksanaan']));
                ?>
                        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">
                            <div class="relative h-48 overflow-hidden bg-gray-100">
                                <img src="assets/img/<?php echo $a['poster']; ?>" alt="<?php echo $a['judul_acara']; ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700" onerror="this.src='https://via.placeholder.com/400x300?text=No+Poster'">
                                <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-md p-2 rounded-lg text-center shadow min-w-[50px]">
                                    <span class="block text-xl font-extrabold text-blue-600 leading-none"><?php echo $tgl; ?></span>
                                    <span class="block text-xs font-bold text-gray-500 uppercase"><?php echo $bln; ?></span>
                                </div>
                                <div class="absolute bottom-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider"><?php echo $a['kategori']; ?></div>
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition"><a href="acara.php"><?php echo $a['judul_acara']; ?></a></h3>
                                <p class="text-gray-500 text-xs line-clamp-3 mb-4 leading-relaxed flex-grow"><?php echo substr($a['deskripsi'], 0, 80); ?>...</p>
                                <a href="acara.php" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1 mt-auto">Detail Acara <i class="fas fa-chevron-right text-xs"></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-span-3 text-center py-10 text-gray-400 italic bg-gray-50 rounded-xl border border-dashed border-gray-300'>Belum ada agenda kegiatan yang ditambahkan.</div>";
                }
                ?>
            </div>
        </div>
    </div>


    <div id="berita" class="py-20 bg-white border-t border-gray-200">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Kabar Himpunan</h2>
                <p class="text-gray-500 text-lg">Ikuti terus update kegiatan, prestasi, dan informasi terbaru.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $q_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");
                if ($q_berita && mysqli_num_rows($q_berita) > 0) {
                    while ($b = mysqli_fetch_array($q_berita)) {
                ?>
                        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">
                            <div class="relative overflow-hidden h-56">
                                <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition z-10"></div>
                                <img src="assets/img/<?php echo $b['gambar']; ?>" alt="<?php echo $b['judul']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700" onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-extrabold text-blue-800 shadow-sm uppercase tracking-wider"><?php echo date('d M Y', strtotime($b['tanggal'])); ?></div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-600 transition line-clamp-2"><a href="detail.php?id=<?php echo $b['id_berita']; ?>"><?php echo $b['judul']; ?></a></h3>
                                <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed"><?php echo substr(strip_tags($b['isi_berita']), 0, 100); ?>...</p>
                                <a href="detail.php?id=<?php echo $b['id_berita']; ?>" class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline mt-auto group-hover:translate-x-1 transition">Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-span-3 text-center py-10 text-gray-400'>Belum ada berita yang diterbitkan.</div>";
                }
                ?>
            </div>
            <div class="text-center mt-12">
                <a href="berita.php" class="inline-block border-2 border-gray-300 text-gray-600 font-bold py-3 px-8 rounded-full hover:border-blue-600 hover:text-blue-600 transition bg-white">Lihat Arsip Berita</a>
            </div>
        </div>
    </div>


    <footer class="bg-gray-900 text-white pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-gray-800 pb-12">

                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-6 flex items-center gap-3">
                        <img src="assets/img/Logo-SIF.jpg" alt="Logo Footer" class="h-10 w-auto rounded-full bg-white p-1">
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
                        <li><a href="berita.php" class="hover:text-blue-400 transition">Berita Terkini</a></li>
                        <li><a href="acara.php" class="hover:text-blue-400 transition">Agenda Acara</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Lokasi & Kontak</h4>
                    <ul class="space-y-4 text-gray-400 text-sm mb-6">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-blue-500"></i>
                            <span class="leading-relaxed">
                                Jl. HR. Soebrantas, Tuah Karya, Kec. Tapung, Kota Pekanbaru, Riau (Gedung Fakultas Sains & Teknologi).
                            </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-blue-500"></i>
                            <span>himasi@uin-suska.ac.id</span>
                        </li>
                    </ul>

                    <div class="rounded-xl overflow-hidden shadow-lg border border-gray-700">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.696316223849!2d101.37279331475358!3d0.4674390996614144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a8f5db0db06b%3A0x46427d14210d7e6!2sFakultas%20Sains%20dan%20Teknologi%20UIN%20Suska%20Riau!5e0!3m2!1sid!2sid!4v1646278832123!5m2!1sid!2sid"
                            width="100%"
                            height="180"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="mt-2 text-right">
                        <a href="https://goo.gl/maps/xyz" target="_blank" class="text-xs text-blue-400 hover:text-blue-300 hover:underline">
                            Buka di Google Maps →
                        </a>
                    </div>
                </div>

            </div>

            <div class="text-center text-gray-600 text-sm">
                © 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>