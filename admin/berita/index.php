<?php
// Include header dan koneksi
include '../../include/header.php';
include '../../include/koneksi.php';

// --- LOGIKA PENCARIAN & FILTER ---
$where = " WHERE 1=1 "; // Default kondisi query
if (isset($_GET['kata_kunci'])) {
    $kata_kunci = mysqli_real_escape_string($koneksi, $_GET['kata_kunci']);
    if (!empty($kata_kunci)) {
        $where .= " AND judul LIKE '%$kata_kunci%' ";
    }
}

if (isset($_GET['kategori_filter'])) {
    $kategori_filter = mysqli_real_escape_string($koneksi, $_GET['kategori_filter']);
    if (!empty($kategori_filter)) {
        $where .= " AND kategori = '$kategori_filter' ";
    }
}

// --- LOGIKA PAGINATION ---
$batas = 5; // Jumlah data per halaman
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data_semua = mysqli_query($koneksi, "SELECT * FROM berita $where");
$jumlah_data = mysqli_num_rows($data_semua);
$total_halaman = ceil($jumlah_data / $batas);

// Query utama untuk menampilkan data tabel
$query = "SELECT * FROM berita $where ORDER BY id DESC LIMIT $halaman_awal, $batas";
$tampil_data = mysqli_query($koneksi, $query);
$nomor = $halaman_awal + 1;
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600 transition">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Manajemen Berita</span>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Kelola Artikel & Berita
                </h1>
                <p class="text-gray-500 mt-2">Pantau, edit, dan publikasikan kegiatan HIMASI.</p>
            </div>

            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Berita Baru
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
                    <i class="far fa-newspaper"></i>
                </div>
                <div>
                    <h4 class="text-gray-500 text-sm font-medium">Total Artikel</h4>
                    <span class="text-2xl font-extrabold text-gray-900"><?php echo $jumlah_data; ?></span>
                </div>
            </div>
            </div>

        <form action="" method="GET" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <input type="text" name="kata_kunci" value="<?php if(isset($_GET['kata_kunci'])){ echo $_GET['kata_kunci']; } ?>" placeholder="Cari judul berita..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm">
                <button type="submit" class="fas fa-search absolute left-4 top-3.5 text-gray-400 border-none bg-transparent cursor-pointer"></button>
            </div>

            <div class="flex gap-2 w-full md:w-auto">
                <select name="kategori_filter" onchange="this.form.submit()" class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Semua Kategori</option>
                    <option value="Berita Umum" <?php if(isset($_GET['kategori_filter']) && $_GET['kategori_filter'] == 'Berita Umum'){ echo "selected"; } ?>>Berita Umum</option>
                    <option value="Berita Mahasiswa" <?php if(isset($_GET['kategori_filter']) && $_GET['kategori_filter'] == 'Berita Mahasiswa'){ echo "selected"; } ?>>Berita Mahasiswa</option>
                    <option value="Prestasi" <?php if(isset($_GET['kategori_filter']) && $_GET['kategori_filter'] == 'Prestasi'){ echo "selected"; } ?>>Prestasi</option>
                    <option value="Akademik" <?php if(isset($_GET['kategori_filter']) && $_GET['kategori_filter'] == 'Akademik'){ echo "selected"; } ?>>Akademik</option>
                </select>
            </div>
        </form>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Info Berita</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        
                        <?php
                        if(mysqli_num_rows($tampil_data) > 0){
                            while($d = mysqli_fetch_array($tampil_data)){
                        ?>
                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium"><?php echo $nomor++; ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <?php if($d['gambar'] != "") { ?>
                                        <img src="../../assets/uploads/berita/<?php echo $d['gambar']; ?>" alt="Thumbnail" class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-200">
                                    <?php } else { ?>
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    <?php } ?>

                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1 max-w-xs" title="<?php echo $d['judul']; ?>">
                                            <?php echo $d['judul']; ?>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-0.5"><i class="far fa-user mr-1"></i> <?php echo $d['penulis']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <?php echo $d['kategori']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <?php echo date('d M Y', strtotime($d['tanggal_terbit'])); ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php if($d['status'] == 'published') { ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                        Published
                                    </span>
                                <?php } else { ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        Draft
                                    </span>
                                <?php } ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="edit.php?id=<?php echo $d['id']; ?>" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition" title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </a>
                                    <a href="proses_hapus.php?id=<?php echo $d['id']; ?>" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition" title="Hapus" onclick="return confirm('Yakin ingin menghapus berita ini? Data dan gambar akan hilang permanen.')">
                                        <i class="fas fa-trash text-xs"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else { 
                        ?>
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="far fa-folder-open text-4xl mb-3 text-gray-300"></i>
                                        <p>Belum ada data berita yang ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <span class="text-sm text-gray-500">
                    Menampilkan <?php echo $jumlah_data > 0 ? $halaman_awal + 1 : 0; ?> sampai <?php echo min($halaman_awal + $batas, $jumlah_data); ?> dari <?php echo $jumlah_data; ?> data
                </span>
                
                <div class="flex gap-1">
                    <?php if($halaman > 1){ ?>
                        <a href="?halaman=<?php echo $previous; ?><?php if(isset($_GET['kata_kunci'])) echo '&kata_kunci='.$_GET['kata_kunci']; ?><?php if(isset($_GET['kategori_filter'])) echo '&kategori_filter='.$_GET['kategori_filter']; ?>" class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition text-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php } else { ?>
                        <button disabled class="px-3 py-1 rounded-md bg-gray-100 border border-gray-300 text-gray-400 text-sm cursor-not-allowed"><i class="fas fa-chevron-left"></i></button>
                    <?php } ?>

                    <?php 
                    for($x = 1; $x <= $total_halaman; $x++){
                        if($x == $halaman) {
                            echo "<a href='#' class='px-3 py-1 rounded-md bg-blue-600 border border-blue-600 text-white text-sm font-bold'>$x</a>";
                        } else {
                            // Trik agar link pagination tetap membawa filter pencarian
                            $link = "?halaman=$x";
                            if(isset($_GET['kata_kunci'])) $link .= "&kata_kunci=".$_GET['kata_kunci'];
                            if(isset($_GET['kategori_filter'])) $link .= "&kategori_filter=".$_GET['kategori_filter'];
                            echo "<a href='$link' class='px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition text-sm'>$x</a>";
                        }
                    }
                    ?>

                    <?php if($halaman < $total_halaman){ ?>
                        <a href="?halaman=<?php echo $next; ?><?php if(isset($_GET['kata_kunci'])) echo '&kata_kunci='.$_GET['kata_kunci']; ?><?php if(isset($_GET['kategori_filter'])) echo '&kategori_filter='.$_GET['kategori_filter']; ?>" class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition text-sm">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php } else { ?>
                        <button disabled class="px-3 py-1 rounded-md bg-gray-100 border border-gray-300 text-gray-400 text-sm cursor-not-allowed"><i class="fas fa-chevron-right"></i></button>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../../include/footer.php'; ?>