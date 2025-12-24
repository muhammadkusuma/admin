<?php 
include '../../include/header.php'; 
include '../../include/koneksi.php';

// Logika Filter
$where = " WHERE 1=1 ";
if(isset($_GET['cari'])){
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $where .= " AND judul LIKE '%$cari%' ";
}
if(isset($_GET['kategori']) && $_GET['kategori'] != ""){
    $kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
    $where .= " AND kategori = '$kategori' ";
}
if(isset($_GET['status']) && $_GET['status'] != ""){
    $status = mysqli_real_escape_string($koneksi, $_GET['status']);
    $where .= " AND status = '$status' ";
}

// Pagination
$batas = 5;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$data_all = mysqli_query($koneksi,"SELECT id FROM acara $where");
$jumlah_data = mysqli_num_rows($data_all);
$total_halaman = ceil($jumlah_data / $batas);

// Query Data
$query = "SELECT * FROM acara $where ORDER BY tanggal DESC LIMIT $halaman_awal, $batas";
$tampil_data = mysqli_query($koneksi, $query);
$nomor = $halaman_awal + 1;
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Agenda Acara</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">Manajemen Kegiatan</h1>
            </div>
            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition flex items-center gap-2">
                <i class="fas fa-calendar-plus"></i> Tambah Agenda
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        
        <form action="" method="GET" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" placeholder="Cari nama kegiatan..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <select name="kategori" onchange="this.form.submit()" class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 cursor-pointer">
                    <option value="">Semua Kategori</option>
                    <option value="Seminar" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Seminar'){ echo "selected"; } ?>>Seminar</option>
                    <option value="Workshop" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Workshop'){ echo "selected"; } ?>>Workshop</option>
                    <option value="Rapat" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Rapat'){ echo "selected"; } ?>>Rapat</option>
                </select>
                <select name="status" onchange="this.form.submit()" class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="Akan Datang" <?php if(isset($_GET['status']) && $_GET['status'] == 'Akan Datang'){ echo "selected"; } ?>>Akan Datang</option>
                    <option value="Selesai" <?php if(isset($_GET['status']) && $_GET['status'] == 'Selesai'){ echo "selected"; } ?>>Selesai</option>
                </select>
            </div>
        </form>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Waktu & Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php while($d = mysqli_fetch_array($tampil_data)){ 
                            // Format Tanggal Cantik (24 Jan)
                            $dateObj = DateTime::createFromFormat('Y-m-d', $d['tanggal']);
                            $bulan = $dateObj->format('M');
                            $tgl = $dateObj->format('d');
                        ?>
                        <tr class="hover:bg-blue-50/30 transition">
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo $nomor++; ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg bg-blue-100 flex flex-col items-center justify-center text-blue-600 shrink-0">
                                        <span class="text-[10px] font-bold uppercase"><?php echo $bulan; ?></span>
                                        <span class="text-lg font-extrabold leading-none"><?php echo $tgl; ?></span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1"><?php echo $d['judul']; ?></div>
                                        <?php if($d['poster'] != "") { ?>
                                            <a href="../../assets/uploads/acara/<?php echo $d['poster']; ?>" target="_blank" class="text-xs text-blue-600 hover:underline">Lihat Poster</a>
                                        <?php } else { ?>
                                            <span class="text-xs text-gray-400">Tidak ada poster</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="far fa-clock text-blue-400"></i> <?php echo date('H:i', strtotime($d['jam'])); ?> WIB</span>
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="fas fa-map-marker-alt text-red-400"></i> <?php echo $d['lokasi']; ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    <?php echo $d['kategori']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($d['status'] == 'Akan Datang') { ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-700 border border-green-200">
                                        <i class="fas fa-circle text-[8px] mr-2 self-center animate-pulse"></i> Akan Datang
                                    </span>
                                <?php } else { ?>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600 border border-gray-200">Selesai</span>
                                <?php } ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="edit.php?id=<?php echo $d['id']; ?>" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fas fa-pencil-alt text-xs"></i></a>
                                    <a href="proses_hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Hapus agenda ini?')" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash text-xs"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                <span class="text-sm text-gray-500">Hal <?php echo $halaman; ?> dari <?php echo $total_halaman; ?></span>
                <div class="flex gap-1">
                    <?php if($halaman > 1){ ?>
                        <a href="?halaman=<?php echo $previous; ?>" class="px-3 py-1 rounded-md bg-white border hover:bg-blue-50 text-sm"><i class="fas fa-chevron-left"></i></a>
                    <?php } ?>
                    <?php if($halaman < $total_halaman){ ?>
                        <a href="?halaman=<?php echo $next; ?>" class="px-3 py-1 rounded-md bg-white border hover:bg-blue-50 text-sm"><i class="fas fa-chevron-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../include/footer.php'; ?>