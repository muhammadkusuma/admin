<?php 
include 'include/header.php'; 
include 'include/koneksi.php';

// 1. TANGKAP ID DARI URL
// Jika tidak ada ID, kembalikan ke index
if(!isset($_GET['id'])){
    echo "<script>window.location='index.php';</script>";
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// 2. AMBIL DATA BERITA UTAMA
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
$d = mysqli_fetch_assoc($query);

// Cek apakah berita ditemukan
if(mysqli_num_rows($query) < 1){
    echo "<script>alert('Berita tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// 3. AMBIL DATA SIDEBAR (BERITA TERBARU & KATEGORI)
// Ambil 5 berita terbaru (kecuali berita yang sedang dibuka)
$query_terbaru = mysqli_query($koneksi, "SELECT * FROM berita WHERE status='published' AND id != '$id' ORDER BY id DESC LIMIT 5");

// Hitung jumlah berita per kategori (Opsional, agar sidebar kategori dinamis)
$q_kat_umum     = mysqli_query($koneksi, "SELECT id FROM berita WHERE kategori='Berita Umum'");
$q_kat_mhs      = mysqli_query($koneksi, "SELECT id FROM berita WHERE kategori='Berita Mahasiswa'");
$q_kat_prestasi = mysqli_query($koneksi, "SELECT id FROM berita WHERE kategori='Prestasi'");
$q_kat_akademik = mysqli_query($koneksi, "SELECT id FROM berita WHERE kategori='Akademik'");
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <a href="index.php" class="hover:text-blue-600 transition">Beranda</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <span class="text-blue-600 font-semibold truncate max-w-xs"><?php echo $d['judul']; ?></span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                <?php echo $d['judul']; ?>
            </h1>

            <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600 font-medium">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-user"></i>
                    </div>
                    <span><?php echo $d['penulis']; ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-calendar"></i>
                    </div>
                    <span><?php echo date('d M Y', strtotime($d['tanggal_terbit'])); ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-folder-open"></i>
                    </div>
                    <span class="text-blue-600"><?php echo $d['kategori']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                <div class="rounded-3xl overflow-hidden shadow-2xl mb-10 border border-gray-100">
                    <?php if($d['gambar'] != "") { ?>
                        <img src="assets/uploads/berita/<?php echo $d['gambar']; ?>" 
                            alt="<?php echo $d['judul']; ?>"
                            class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                    <?php } else { ?>
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400">
                            <i class="fas fa-image text-5xl"></i>
                        </div>
                    <?php } ?>
                </div>

                <article class="text-gray-700 text-lg leading-relaxed space-y-6">
                    <?php 
                        // Menampilkan isi konten. 
                        // Jika konten mengandung HTML (dari summernote/text editor), echo langsung.
                        // Jika plain text, gunakan nl2br() agar enter terbaca.
                        echo $d['isi']; 
                    ?>
                </article>

                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-900 text-sm">Bagikan:</span>
                            <a href="#" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="w-8 h-8 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 transition"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">Cari Berita</h3>
                        <form action="" class="relative" onsubmit="alert('Fitur pencarian belum tersedia di halaman ini.'); return false;">
                            <input type="text" placeholder="Ketik kata kunci..." class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <button class="absolute right-3 top-3 text-gray-400 hover:text-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg flex items-center gap-2">
                            <span class="w-1 h-6 bg-blue-600 rounded-full"></span> Kategori
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Berita Umum</span>
                                    <span class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">
                                        <?php echo mysqli_num_rows($q_kat_umum); ?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Berita Mahasiswa</span>
                                    <span class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">
                                        <?php echo mysqli_num_rows($q_kat_mhs); ?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Prestasi</span>
                                    <span class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">
                                        <?php echo mysqli_num_rows($q_kat_prestasi); ?>
                                    </span>
                                </a>
                            </li>
                             <li>
                                <a href="#" class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Akademik</span>
                                    <span class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">
                                        <?php echo mysqli_num_rows($q_kat_akademik); ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-6 text-lg flex items-center gap-2">
                            <span class="w-1 h-6 bg-yellow-400 rounded-full"></span> Terbaru
                        </h3>
                        <div class="space-y-6">
                            <?php while($dt = mysqli_fetch_array($query_terbaru)){ ?>
                            <a href="detail.php?id=<?php echo $dt['id']; ?>" class="flex gap-4 group">
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100">
                                    <?php if($dt['gambar'] != "") { ?>
                                        <img src="assets/uploads/berita/<?php echo $dt['gambar']; ?>" alt="News" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    <?php } else { ?>
                                         <div class="w-full h-full flex items-center justify-center text-gray-400"><i class="fas fa-image"></i></div>
                                    <?php } ?>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">
                                        <?php echo date('d M Y', strtotime($dt['tanggal_terbit'])); ?>
                                    </span>
                                    <h4 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-blue-600 transition line-clamp-2 mt-1">
                                        <?php echo $dt['judul']; ?>
                                    </h4>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>