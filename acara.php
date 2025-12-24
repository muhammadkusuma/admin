<?php 
// FILE: acara.php
include 'includes/koneksi.php'; 

// 1. TANGKAP KATEGORI DARI URL
// Jika user klik menu PBAK, URL akan jadi: acara.php?kategori=PBAK
$kategori_terpilih = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Judul Halaman Dinamis
$judul_halaman = "Agenda & Kegiatan";
$deskripsi_halaman = "Semua kegiatan seru dari HIMASI UIN Suska Riau.";

if($kategori_terpilih == 'PBAK') {
    $judul_halaman = "PBAK (Pengenalan Budaya Akademik)";
    $deskripsi_halaman = "Dokumentasi dan informasi seputar penyambutan mahasiswa baru.";
} elseif($kategori_terpilih == 'Fortasi') {
    $judul_halaman = "FORTASI (Forum Taaruf)";
    $deskripsi_halaman = "Momen keakraban dan pengenalan lingkungan kampus.";
} elseif($kategori_terpilih == 'KBM-SI') {
    $judul_halaman = "KBM-SI (Kemah Bhakti)";
    $deskripsi_halaman = "Kegiatan pengabdian dan keakraban di alam terbuka.";
}
// ... Anda bisa tambahkan if lain sesuai kebutuhan
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul_halaman; ?> - HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white/95 backdrop-blur-md fixed top-0 z-50 w-full shadow-sm border-b border-gray-100"> 
        <div class="w-full px-4 md:px-8 py-3 flex justify-between items-center">
            <a class="flex items-center gap-3" href="index.php">
                <img src="assets/img/Logo-SIF.jpg" alt="HIMA" class="h-10 w-auto">
                <div class="flex flex-col">
                    <span class="font-extrabold text-xl text-blue-900 leading-none">HIMASI</span>
                    <span class="text-[10px] text-gray-500 font-bold uppercase">UIN Suska Riau</span>
                </div>
            </a>
            <div class="hidden md:flex items-center space-x-1"> 
                <a href="index.php" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Beranda</a>
                <a href="index.php#berita" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Berita</a>
                <a href="acara.php" class="px-4 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded-full transition">
                    <?php echo ($kategori_terpilih) ? $kategori_terpilih : 'Semua Acara'; ?>
                </a>
            </div>
        </div>
    </nav>

    <div class="pt-32 pb-16 bg-white border-b">
        <div class="container mx-auto px-6 text-center">
            <span class="text-blue-600 font-bold tracking-widest text-sm uppercase mb-2 block">
                <?php echo ($kategori_terpilih) ? 'KATEGORI KEGIATAN' : 'ARSIP KEGIATAN'; ?>
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4"><?php echo $judul_halaman; ?></h1>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto"><?php echo $deskripsi_halaman; ?></p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex items-center justify-between mb-10">
                <h3 class="text-2xl font-bold text-gray-900 border-l-4 border-blue-600 pl-4">Agenda Kegiatan</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // LOGIKA QUERY: Jika ada kategori, filter by kategori. Jika tidak, tampilkan semua.
                if($kategori_terpilih != ""){
                    $query = mysqli_query($koneksi, "SELECT * FROM acara WHERE kategori = '$kategori_terpilih' ORDER BY tanggal_pelaksanaan DESC");
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM acara ORDER BY tanggal_pelaksanaan DESC");
                }
                
                if(mysqli_num_rows($query) > 0) {
                    while($data = mysqli_fetch_array($query)){
                        $tgl = date('d', strtotime($data['tanggal_pelaksanaan']));
                        $bln = date('M', strtotime($data['tanggal_pelaksanaan']));
                ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full">
                    <div class="relative h-56 overflow-hidden">
                        <img src="assets/img/<?php echo $data['poster']; ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur p-2 rounded-lg text-center shadow min-w-[60px]">
                            <span class="block text-xl font-bold text-blue-600 leading-none"><?php echo $tgl; ?></span>
                            <span class="block text-xs font-bold text-gray-500 uppercase"><?php echo $bln; ?></span>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                            <?php echo $data['kategori']; ?>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-xs text-gray-500 mb-2 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-red-500"></i> <?php echo $data['lokasi']; ?>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">
                            <?php echo $data['judul_acara']; ?>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-grow">
                            <?php echo substr($data['deskripsi'], 0, 100); ?>...
                        </p>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    echo '<div class="col-span-full text-center py-10 text-gray-400">Belum ada agenda di kategori ini.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="py-16 bg-white border-t border-gray-200">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Dokumentasi & Keseruan</h2>
                <p class="text-gray-500">Momen-momen terbaik dari kegiatan <?php echo ($kategori_terpilih) ? $kategori_terpilih : 'HIMASI'; ?>.</p>
            </div>

            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 px-4">
                <?php
                // LOGIKA QUERY DOKUMENTASI
                // Kita ambil foto dari tabel 'dokumentasi' (jika Anda buat) 
                // ATAU untuk sementara kita ambil dari poster acara yang sudah lewat sebagai contoh
                
                if($kategori_terpilih != ""){
                    // Jika kategori dipilih, ambil dokumentasi kategori itu
                    // Ganti nama tabel 'acara' dengan 'dokumentasi' jika Anda sudah input data ke tabel dokumentasi
                    $q_galeri = mysqli_query($koneksi, "SELECT * FROM acara WHERE kategori = '$kategori_terpilih' AND tanggal_pelaksanaan < NOW() ORDER BY id_acara DESC");
                } else {
                    $q_galeri = mysqli_query($koneksi, "SELECT * FROM acara WHERE tanggal_pelaksanaan < NOW() ORDER BY id_acara DESC LIMIT 9");
                }

                if(mysqli_num_rows($q_galeri) > 0){
                    while($foto = mysqli_fetch_array($q_galeri)){
                ?>
                    <div class="break-inside-avoid rounded-xl overflow-hidden group relative mb-6">
                        <img src="assets/img/<?php echo $foto['poster']; ?>" class="w-full h-auto rounded-xl hover:opacity-90 transition duration-300">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                            <div class="text-white">
                                <h4 class="font-bold text-lg"><?php echo $foto['judul_acara']; ?></h4>
                                <span class="text-xs opacity-80"><?php echo date('d M Y', strtotime($foto['tanggal_pelaksanaan'])); ?></span>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } else {
                    echo '<div class="text-center text-gray-400 col-span-full py-10 w-full">Belum ada dokumentasi diunggah.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-10 text-center text-sm">
        &copy; 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.
    </footer>

</body>
</html>