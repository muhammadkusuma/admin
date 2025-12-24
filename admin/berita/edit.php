<?php
include '../../include/header.php';
include '../../include/koneksi.php';

// Cek apakah ada ID yang dikirim
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600 transition">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <a href="index.php" class="hover:text-blue-600 transition">Berita</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Edit Berita</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Edit Artikel
                </h1>
            </div>
            
            <a href="index.php" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-600 font-bold rounded-xl hover:bg-gray-50 hover:text-blue-600 transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-10">
                    <form action="proses_edit.php" method="POST" enctype="multipart/form-data" class="space-y-8">
                        
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                            <input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="kategori" class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition appearance-none cursor-pointer" required>
                                        <option value="Berita Umum" <?php if($data['kategori'] == 'Berita Umum') echo 'selected'; ?>>Berita Umum</option>
                                        <option value="Berita Mahasiswa" <?php if($data['kategori'] == 'Berita Mahasiswa') echo 'selected'; ?>>Berita Mahasiswa</option>
                                        <option value="Prestasi" <?php if($data['kategori'] == 'Prestasi') echo 'selected'; ?>>Prestasi</option>
                                        <option value="Akademik" <?php if($data['kategori'] == 'Akademik') echo 'selected'; ?>>Akademik</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                                <div class="relative">
                                    <select name="status" class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition appearance-none cursor-pointer">
                                        <option value="published" <?php if($data['status'] == 'published') echo 'selected'; ?>>Published (Tayang)</option>
                                        <option value="draft" <?php if($data['status'] == 'draft') echo 'selected'; ?>>Draft (Disimpan)</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Terbit <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal" value="<?php echo $data['tanggal_terbit']; ?>" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Sampul</label>
                            
                            <?php if($data['gambar'] != "") { ?>
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 mb-1">Gambar saat ini:</p>
                                    <img src="../../assets/uploads/berita/<?php echo $data['gambar']; ?>" class="h-32 rounded-lg border border-gray-200 p-1">
                                </div>
                            <?php } ?>

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                        <div id="upload-placeholder">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2 group-hover:text-blue-500 transition"></i>
                                            <p class="mb-1 text-sm text-gray-500"><span class="font-semibold text-blue-600">Klik untuk ganti gambar</span> (Opsional)</p>
                                            <p class="text-xs text-gray-400">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                                        </div>
                                    </div>
                                    <input id="dropzone-file" type="file" name="gambar" class="hidden" accept="image/*" />
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Isi Konten <span class="text-red-500">*</span></label>
                            <textarea name="isi" rows="12" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition leading-relaxed" required><?php echo $data['isi']; ?></textarea>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex items-center gap-4">
                            <button type="submit" name="update" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 w-full md:w-auto flex justify-center items-center gap-2">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../../include/footer.php'; ?>