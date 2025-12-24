<?php
// FILE: berita.php
include 'includes/koneksi.php';

// --- LOGIKA FILTER BERITA ---
$kategori_pilih = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$where_sql = "";
$judul_halaman = "Kabar Himpunan";
$deskripsi_halaman = "Informasi terbaru seputar kegiatan, prestasi, dan artikel teknologi.";

if ($kategori_pilih != "") {
    $kat_clean = mysqli_real_escape_string($koneksi, $kategori_pilih);
    $where_sql = "WHERE kategori = '$kat_clean'";
    $judul_halaman = "Kategori: " . $kategori_pilih;
    $deskripsi_halaman = "Menampilkan arsip berita khusus topik " . $kategori_pilih;
}

// --- AMBIL BERITA UTAMA (HEADLINE) ---
$q_headline = mysqli_query($koneksi, "SELECT * FROM berita $where_sql ORDER BY tanggal DESC LIMIT 1");
$headline = mysqli_fetch_array($q_headline);

// --- AMBIL BERITA LAINNYA (SISANYA) ---
$offset = ($headline) ? 1 : 0;
$q_others = mysqli_query($koneksi, "SELECT * FROM berita $where_sql ORDER BY tanggal DESC LIMIT 9 OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul_halaman; ?> - HIMASI UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* CSS Glass Effect Navbar */
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        /* SAYA SUDAH MENGHAPUS CSS line-clamp DI SINI */
        /* Tailwind akan otomatis menangani pemotongan teks */
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
                    <a href="index.php" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-full transition">Beranda</a>
                    
                    <div class="relative group">
                        <a href="berita.php" class="px-4 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded-full flex items-center gap-1 transition">
                            Berita <i class="fas fa-chevron-down text-[10px] pt-1"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
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
                <a href="index.php" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Beranda</a>
                <a href="berita.php" class="block px-4 py-3 font-bold text-blue-600 bg-blue-50 rounded-lg">Berita</a>
                <a href="acara.php" class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Acara</a>
            </div>
        </div>
    </nav>
    <div class="relative pt-32 pb-6 bg-white border-b border-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                <?php echo $judul_halaman; ?>
            </h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                <?php echo $deskripsi_halaman; ?>
            </p>
        </div>

        <div class="container mx-auto px-6 mt-8">
            <div class="flex flex-wrap justify-center gap-2">
                <a href="berita.php" class="px-5 py-2 rounded-full text-sm font-bold transition shadow-sm <?php echo ($kategori_pilih == '') ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?>">
                   Semua
                </a>
                <a href="berita.php?kategori=Berita Umum" class="px-5 py-2 rounded-full text-sm font-bold transition shadow-sm <?php echo ($kategori_pilih == 'Berita Umum') ? 'bg-blue-600 text-white shadow-blue-300' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50'; ?>">
                   Berita Umum
                </a>
                <a href="berita.php?kategori=Berita Mahasiswa" class="px-5 py-2 rounded-full text-sm font-bold transition shadow-sm <?php echo ($kategori_pilih == 'Berita Mahasiswa') ? 'bg-blue-600 text-white shadow-blue-300' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50'; ?>">
                   Berita Mahasiswa
                </a>
            </div>
        </div>
    </div>


    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <?php if($headline) { ?>
            <div class="mb-16">
                <div class="text-sm font-bold text-blue-600 mb-4 uppercase tracking-widest px-1 flex items-center gap-2">
                    <i class="fas fa-bolt"></i> Berita Utama
                </div>
                
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden group hover:shadow-2xl transition duration-500 border border-gray-100 grid grid-cols-1 lg:grid-cols-2">
                    <div class="relative h-64 lg:h-auto overflow-hidden">
                        <div class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition z-10"></div>
                        <img src="assets/img/<?php echo $headline['gambar']; ?>" 
                             alt="<?php echo $headline['judul']; ?>" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700"
                             onerror="this.src='https://via.placeholder.com/800x600'">
                        
                        <div class="absolute top-6 left-6 z-20 bg-white/95 backdrop-blur px-4 py-2 rounded-xl text-sm font-extrabold text-blue-900 shadow-lg">
                            <?php echo date('d M Y', strtotime($headline['tanggal'])); ?>
                        </div>
                        <div class="absolute bottom-6 left-6 z-20 bg-blue-600/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-white shadow uppercase tracking-wider">
                            <?php echo ($headline['kategori']) ? $headline['kategori'] : 'Umum'; ?>
                        </div>
                    </div>

                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full mb-4 w-max">HIGHLIGHT</span>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-6 leading-tight group-hover:text-blue-700 transition">
                            <a href="detail.php?id=<?php echo $headline['id_berita']; ?>">
                                <?php echo $headline['judul']; ?>
                            </a>
                        </h2>
                        <p class="text-gray-500 text-lg mb-8 line-clamp-3 leading-relaxed">
                            <?php echo substr(strip_tags($headline['isi_berita']), 0, 200); ?>...
                        </p>
                        <a href="detail.php?id=<?php echo $headline['id_berita']; ?>" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 font-bold py-3 px-8 rounded-full transition shadow-lg hover:shadow-blue-500/30 transform hover:-translate-y-1 w-max">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                    <h3 class="text-xl font-bold text-gray-700">Belum ada berita.</h3>
                    <p class="text-gray-500">Coba pilih kategori lain atau cek kembali nanti.</p>
                </div>
            <?php } ?>


            <?php if(mysqli_num_rows($q_others) > 0) { ?>
            <div class="flex items-center justify-between mb-8 px-1">
                <h3 class="text-2xl font-bold text-gray-900">Artikel Lainnya</h3>
                <div class="h-1 flex-grow bg-gray-200 ml-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while($b = mysqli_fetch_array($q_others)){ ?>
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition z-10"></div>
                        <img src="assets/img/<?php echo $b['gambar']; ?>" 
                             alt="<?php echo $b['judul']; ?>"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
                             onerror="this.src='https://via.placeholder.com/400x300'">
                        
                        <div class="absolute top-4 right-4 z-20 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-extrabold text-blue-800 shadow-sm uppercase tracking-wider">
                            <?php echo date('d M Y', strtotime($b['tanggal'])); ?>
                        </div>
                        <div class="absolute bottom-4 left-4 z-20 bg-blue-600/90 px-2 py-1 rounded text-[10px] font-bold text-white shadow uppercase">
                            <?php echo ($b['kategori']) ? $b['kategori'] : 'Umum'; ?>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-600 transition line-clamp-2">
                            <a href="detail.php?id=<?php echo $b['id_berita']; ?>">
                                <?php echo $b['judul']; ?>
                            </a>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                            <?php echo substr(strip_tags($b['isi_berita']), 0, 100); ?>...
                        </p>
                        <a href="detail.php?id=<?php echo $b['id_berita']; ?>" class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline mt-auto group-hover:translate-x-1 transition">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

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
                    <p class="text-gray-400 leading-relaxed max-w-sm mb-6">Mewujudkan mahasiswa Sistem Informasi yang unggul dalam teknologi, berjiwa pemimpin, dan menjunjung tinggi nilai-nilai keislaman.</p>
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
                    <h4 class="text-lg font-bold mb-6 text-white">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3"><i class="fas fa-map-marker-alt mt-1 text-blue-500"></i><span>Gedung Fakultas Sains & Teknologi, UIN Suska Riau.</span></li>
                        <li class="flex items-center gap-3"><i class="fas fa-envelope text-blue-500"></i><span>himasi@uin-suska.ac.id</span></li>
                    </ul>
                </div>
            </div>
            <div class="text-center text-gray-600 text-sm">&copy; 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.</div>
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