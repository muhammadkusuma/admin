<?php 
include '../../include/header.php'; 
include '../../include/koneksi.php';

// Logika Pencarian
$where = " WHERE 1=1 ";
if(isset($_GET['cari'])){
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $where .= " AND (nama LIKE '%$cari%' OR nim LIKE '%$cari%') ";
}

// Pagination
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi,"SELECT * FROM anggota $where");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_anggota = mysqli_query($koneksi, "SELECT * FROM anggota $where ORDER BY id DESC LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Data Anggota</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900">Manajemen Anggota</h1>
            </div>
            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition flex items-center gap-2">
                <i class="fas fa-user-plus"></i> Tambah
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex justify-between items-center gap-4">
            <form action="" method="GET" class="relative w-full md:w-96">
                <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" placeholder="Cari nama atau NIM..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Nama & NIM</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Jabatan / Divisi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Angkatan</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php while($d = mysqli_fetch_array($data_anggota)){ ?>
                        <tr class="hover:bg-blue-50/30 transition">
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo $nomor++; ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="../../assets/uploads/anggota/<?php echo ($d['foto'] != '' && $d['foto'] != 'default.jpg') ? $d['foto'] : 'https://ui-avatars.com/api/?name='.urlencode($d['nama']).'&background=random'; ?>" class="w-10 h-10 rounded-full border border-gray-200 object-cover">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900"><?php echo $d['nama']; ?></div>
                                        <div class="text-xs text-blue-600 font-mono"><?php echo $d['nim']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block text-sm font-semibold text-gray-800"><?php echo $d['jabatan']; ?></span>
                                <span class="block text-xs text-gray-500"><?php echo $d['divisi']; ?></span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold"><?php echo $d['angkatan']; ?></span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="edit.php?id=<?php echo $d['id']; ?>" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fas fa-pencil-alt text-xs"></i></a>
                                    <a href="proses_hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Hapus data ini?')" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash text-xs"></i></a>
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