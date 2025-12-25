<?php 
include 'include/header.php'; 
include_once 'include/koneksi.php'; // Pakai include_once biar aman

// --- LOGIKA MENGAMBIL DATA ---

// 1. STATISTIK
$q_anggota  = mysqli_query($koneksi, "SELECT id FROM anggota");
$jml_anggota = mysqli_num_rows($q_anggota);
$q_agenda_all = mysqli_query($koneksi, "SELECT id FROM acara");
$jml_agenda_all = mysqli_num_rows($q_agenda_all);

// 2. DATA PROFIL (Semua, untuk di-loop)
$q_profil_all = mysqli_query($koneksi, "SELECT * FROM profil ORDER BY urutan ASC");

// 3. AGENDA (3 Terbaru)
$q_agenda = mysqli_query($koneksi, "SELECT * FROM acara ORDER BY tanggal DESC LIMIT 3");

// 4. BERITA (Dengan Filter Kategori)
$where_berita = "WHERE status='published'";
$label_kategori = "Berita & Artikel Terkini";

if(isset($_GET['kategori'])){
    $kat = mysqli_real_escape_string($koneksi, $_GET['kategori']);
    $where_berita .= " AND kategori = '$kat'";
    $label_kategori = "Kategori: " . $kat;
}

$q_berita = mysqli_query($koneksi, "SELECT * FROM berita $where_berita ORDER BY tanggal_terbit DESC LIMIT 6");
?>

<div class="relative h-screen min-h-[600px] flex items-center justify-center bg-fixed bg-center bg-cover"
    style="background-image: url('https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
    <div class="absolute inset-0 bg-gray-900/70"></div>
    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="fade-in-up">
            <span class="inline-block py-1 px-4 rounded-full border border-white/30 bg-white/10 backdrop-blur-md text-blue-100 text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-6">
                Official Website
            </span>
        </div>
        <h1 class="fade-in-up delay-100 text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl">
            Himpunan Mahasiswa <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Sistem Informasi</span>
        </h1>
        <p class="fade-in-up delay-200 text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Wadah aspirasi, inovasi, dan kreativitas mahasiswa UIN Suska Riau. Bersinergi mewujudkan teknologi masa depan.
        </p>
        <div class="fade-in-up delay-300 flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#profil-section" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                Kenal Lebih Dekat <i class="fas fa-arrow-right"></i>
            </a>
            <a href="#berita" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-bold rounded-full transition transform hover:-translate-y-1">
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
            <div class="text-4xl font-extrabold text-yellow-500 mb-1">8</div>
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Divisi & Biro</div>
        </div>
        <div class="w-full md:w-1/3 p-4">
            <div class="text-4xl font-extrabold text-cyan-500 mb-1"><?php echo $jml_agenda_all; ?></div>
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Agenda Kegiatan</div>
        </div>
    </div>
</div>

<div id="profil-section" class="bg-white">
    <?php 
    $counter = 0;
    while($dp = mysqli_fetch_array($q_profil_all)){ 
        $counter++;
        // Selang-seling warna background dan posisi gambar agar tidak bosan
        $bg_class = ($counter % 2 == 0) ? 'bg-blue-50/50' : 'bg-white';
        $order_img = ($counter % 2 == 0) ? 'md:order-2' : ''; // Gambar ganti posisi kanan/kiri
        
        $img_src = "https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
        if($dp['gambar'] != "") $img_src = "assets/uploads/profil/" . $dp['gambar'];
    ?>
    <div id="profil-<?php echo $dp['id']; ?>" class="py-24 <?php echo $bg_class; ?> scroll-mt-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                
                <div class="w-full md:w-1/2 relative <?php echo $order_img; ?>">
                    <?php if($counter == 1) { // Efek hiasan cuma di item pertama ?>
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                    <div class="absolute bottom-0 -right-4 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                    <?php } ?>
                    
                    <img src="<?php echo $img_src; ?>"
                        alt="<?php echo $dp['judul_bagian']; ?>"
                        class="relative z-10 rounded-2xl shadow-2xl rotate-1 hover:rotate-0 transition duration-500 w-full max-w-md mx-auto border-4 border-white object-cover">
                </div>
                
                <div class="w-full md:w-1/2">
                    <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Profil HIMASI</h4>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                        <?php echo $dp['judul_bagian']; ?>
                    </h2>
                    
                    <div class="text-gray-600 text-lg leading-relaxed mb-6 prose">
                        <?php echo nl2br($dp['isi_konten']); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div id="sambutan" class="py-24 bg-blue-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-blue-200 uppercase bg-blue-800 rounded-full border border-blue-700">
                Leadership Message
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold mb-8 leading-tight">
                "Mahasiswa Sistem Informasi bukan hanya tentang kode, tapi tentang <span class="text-blue-300">solusi bagi peradaban</span>."
            </h2>
            <div class="flex items-center justify-center gap-4">
                <img src="https://ui-avatars.com/api/?name=Muhammad+Fulan&background=random" class="w-16 h-16 rounded-full border-4 border-blue-800">
                <div class="text-left">
                    <h4 class="font-bold text-lg">Muhammad Fulan</h4>
                    <p class="text-blue-300 text-sm">Bupati HIMASI 2025/2026</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="berita" class="py-24 bg-white border-t border-gray-100 scroll-mt-20">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 font-bold tracking-[0.2em] text-sm uppercase mb-2 block">News Update</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900"><?php echo $label_kategori; ?></h2>
            <?php if(isset($_GET['kategori'])) { ?>
                <a href="index.php#berita" class="inline-block mt-4 text-sm text-red-500 hover:text-red-700"><i class="fas fa-times"></i> Hapus Filter</a>
            <?php } else { ?>
                <p class="text-gray-500 mt-4">Informasi terbaru seputar kegiatan, prestasi, dan wawasan teknologi.</p>
            <?php } ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php 
            if(mysqli_num_rows($q_berita) > 0) {
                while($db = mysqli_fetch_array($q_berita)){ 
                    $tgl_berita = date('d M Y', strtotime($db['tanggal_terbit']));
            ?>
            <a href="detail.php?id=<?php echo $db['id']; ?>" class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full">
                <div class="relative h-56 overflow-hidden">
                    <?php if($db['gambar'] != "") { ?>
                        <img src="assets/uploads/berita/<?php echo $db['gambar']; ?>" alt="<?php echo $db['judul']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <?php } else { ?>
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400"><i class="fas fa-newspaper text-4xl"></i></div>
                    <?php } ?>
                    <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/60 to-transparent w-full p-4">
                        <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">
                            <?php echo $db['kategori']; ?>
                        </span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-3 font-medium">
                        <i class="far fa-calendar-alt text-blue-500"></i> <?php echo $tgl_berita; ?>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition">
                        <?php echo $db['judul']; ?>
                    </h3>
                    <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-grow">
                        <?php echo substr(strip_tags($db['isi']), 0, 100); ?>...
                    </p>
                    <div class="text-blue-600 font-bold text-sm flex items-center gap-2 mt-auto">
                        Baca Selengkapnya <i class="fas fa-arrow-right group-hover:translate-x-1 transition"></i>
                    </div>
                </div>
            </a>
            <?php 
                } 
            } else {
            ?>
                <div class="col-span-3 text-center py-10">
                    <div class="inline-block p-4 rounded-full bg-gray-50 text-gray-400 mb-3"><i class="far fa-newspaper text-4xl"></i></div>
                    <p class="text-gray-500 italic">Belum ada berita dalam kategori ini.</p>
                    <a href="index.php#berita" class="text-blue-600 text-sm font-bold mt-2 inline-block">Lihat Semua Berita</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="agenda" class="py-20 bg-gray-50 border-t border-gray-100 scroll-mt-20">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Agenda Kegiatan</h2>
        <p class="text-gray-500 mb-10">Jangan lewatkan kegiatan seru dari HIMASI.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php 
            if(mysqli_num_rows($q_agenda) > 0) {
                while($da = mysqli_fetch_array($q_agenda)){ 
                    $tgl_agenda = date('d F Y', strtotime($da['tanggal']));
            ?>
            <a href="detail_acara.php?id=<?php echo $da['id']; ?>" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition text-left flex flex-col h-full border border-gray-100">
                <div class="mb-4 relative h-48 rounded-xl overflow-hidden">
                    <?php if($da['poster'] != "") { ?>
                        <img src="assets/uploads/acara/<?php echo $da['poster']; ?>" alt="<?php echo $da['judul']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <?php } else { ?>
                        <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200"><i class="fas fa-calendar-alt text-4xl"></i></div>
                    <?php } ?>
                    <span class="absolute top-2 right-2 px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-bold rounded-lg text-blue-600 shadow-sm">
                        <?php echo $da['kategori']; ?>
                    </span>
                </div>
                
                <h3 class="font-bold text-xl text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition"><?php echo $da['judul']; ?></h3>
                <p class="text-gray-500 text-sm mb-4 flex items-center gap-2">
                    <i class="far fa-clock text-blue-500"></i> <?php echo $tgl_agenda; ?>
                </p>
                <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                     <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded">
                        <?php echo ($da['status'] == 'Akan Datang') ? 'Segera' : 'Selesai'; ?>
                     </span>
                     <span class="text-sm font-bold text-blue-600 flex items-center gap-1 opacity-0 group-hover:opacity-100 transition transform translate-x-[-10px] group-hover:translate-x-0">
                        Detail <i class="fas fa-arrow-right"></i>
                     </span>
                </div>
            </a>
            <?php 
                } 
            } else {
            ?>
                <div class="col-span-3 py-10">
                    <p class="text-gray-500 italic">Belum ada agenda yang ditambahkan.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>