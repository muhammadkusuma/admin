<?php
include 'include/header.php';
include 'include/koneksi.php';

// 1. TANGKAP ID
if (!isset($_GET['id'])) {
    echo "<script>window.location='index.php';</script>";
    exit;
}
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// 2. AMBIL DATA ACARA UTAMA
$query = mysqli_query($koneksi, "SELECT * FROM acara WHERE id='$id'");
$d = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    echo "<script>alert('Agenda tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// 3. AMBIL DATA SIDEBAR (Agenda Lainnya)
$query_lain = mysqli_query($koneksi, "SELECT * FROM acara WHERE id != '$id' ORDER BY tanggal DESC LIMIT 5");
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <a href="index.php" class="hover:text-blue-600 transition">Beranda</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <a href="index.php#agenda" class="hover:text-blue-600 transition">Agenda</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <span class="text-blue-600 font-semibold truncate max-w-xs"><?php echo $d['judul']; ?></span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                <?php echo $d['judul']; ?>
            </h1>

            <div class="flex flex-wrap gap-4 md:gap-8 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-lg">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 font-bold uppercase">Tanggal</div>
                        <div class="text-gray-900 font-bold"><?php echo date('d F Y', strtotime($d['tanggal'])); ?>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 text-lg">
                        <i class="far fa-clock"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 font-bold uppercase">Waktu</div>
                        <div class="text-gray-900 font-bold"><?php echo date('H:i', strtotime($d['jam'])); ?> WIB</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 text-lg">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 font-bold uppercase">Lokasi</div>
                        <div class="text-gray-900 font-bold"><?php echo $d['lokasi']; ?></div>
                    </div>
                </div>

                <div class="flex items-center gap-3 ml-auto">
                    <?php if ($d['status'] == 'Akan Datang') { ?>
                        <span
                            class="px-4 py-2 bg-green-100 text-green-700 font-bold rounded-xl border border-green-200 animate-pulse">
                            Akan Datang
                        </span>
                    <?php } else { ?>
                        <span class="px-4 py-2 bg-gray-100 text-gray-500 font-bold rounded-xl border border-gray-200">
                            Selesai
                        </span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                <?php if ($d['poster'] != "") { ?>
                    <div class="rounded-3xl overflow-hidden shadow-xl mb-10 border border-gray-100 bg-gray-50">
                        <img src="assets/uploads/acara/<?php echo $d['poster']; ?>" alt="<?php echo $d['judul']; ?>"
                            class="w-full h-auto object-contain max-h-[600px] mx-auto">
                    </div>
                <?php } ?>

                <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Kegiatan</h3>
                    <?php echo nl2br($d['deskripsi']); ?>
                </div>

                <?php if ($d['status'] == 'Akan Datang') { ?>
                    <div class="mt-10 p-8 bg-blue-50 rounded-2xl border border-blue-100 text-center">
                        <h4 class="text-xl font-bold text-blue-900 mb-2">Tertarik mengikuti acara ini?</h4>
                        <p class="text-blue-700/70 mb-6">Segera daftarkan diri kamu sebelum kuota penuh!</p>
                        <a href="#"
                            class="inline-block px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition transform hover:-translate-y-1">
                            Daftar Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-6 text-lg flex items-center gap-2">
                            <span class="w-1 h-6 bg-yellow-400 rounded-full"></span> Agenda Lainnya
                        </h3>
                        <div class="space-y-6">
                            <?php while ($da = mysqli_fetch_array($query_lain)) { ?>
                                <a href="detail_acara.php?id=<?php echo $da['id']; ?>" class="flex gap-4 group">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100 relative">
                                        <?php if ($da['poster'] != "") { ?>
                                            <img src="assets/uploads/acara/<?php echo $da['poster']; ?>"
                                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                        <?php } else { ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-400"><i
                                                    class="fas fa-calendar"></i></div>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">
                                            <?php echo date('d M Y', strtotime($da['tanggal'])); ?>
                                        </span>
                                        <h4
                                            class="font-bold text-gray-800 text-sm leading-snug group-hover:text-blue-600 transition line-clamp-2 mt-1">
                                            <?php echo $da['judul']; ?>
                                        </h4>
                                        <span class="text-xs text-gray-500 mt-1 block"><i
                                                class="fas fa-map-marker-alt mr-1"></i> <?php echo $da['lokasi']; ?></span>
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