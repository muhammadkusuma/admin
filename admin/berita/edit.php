<?php
include '../../include/header.php';
include '../../include/koneksi.php';

// Cek apakah ada ID yang dikirim
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!$id) {
    header("Location: index.php");
    exit;
}

// Ambil data lama dari database
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
                    Edit Artikel & Berita
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Terbit <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal" value="<?php echo $data['tanggal_terbit']; ?>" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Status Publikasi</label>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="published" class="w-5 h-5 text-blue-600" <?php if($data['status'] == 'published') echo 'checked'; ?>>
                                    <span class="text-sm text-gray-700 font-medium">Published (Tayang)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="draft" class="w-5 h-5 text-blue-600" <?php if($data['status'] == 'draft') echo 'checked'; ?>>
                                    <span class="text-sm text-gray-700 font-medium">Draft (Sembunyikan)</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Artikel</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition group overflow-hidden relative">
                                    
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4 z-10">
                                        
                                        <img id="preview-image" src="../../assets/uploads/berita/<?php echo $data['gambar']; ?>" 
                                             class="<?php echo ($data['gambar'] == '') ? 'hidden' : ''; ?> h-48 object-contain mb-3 rounded-lg shadow-sm" />

                                        <div id="upload-placeholder" class="<?php echo ($data['gambar'] != '') ? 'hidden' : ''; ?>">
                                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3 group-hover:text-blue-500 transition"></i>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold text-blue-600">Klik untuk ganti gambar</span></p>
                                            <p class="text-xs text-gray-400">Biarkan jika tidak ingin mengubah</p>
                                        </div>
                                    </div>

                                    <input id="dropzone-file" type="file" name="gambar" class="hidden" accept="image/*" onchange="previewFile()" />
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Isi Konten <span class="text-red-500">*</span></label>
                            <textarea name="isi" rows="12" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition leading-relaxed" placeholder="Tuliskan isi berita..." required><?php echo $data['isi']; ?></textarea>
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

<script>
function previewFile() {
    const preview = document.getElementById('preview-image');
    const placeholder = document.getElementById('upload-placeholder');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // Ganti src gambar dengan gambar baru yang dipilih
        preview.src = reader.result;
        preview.classList.remove('hidden'); // Tampilkan gambar
        placeholder.classList.add('hidden'); // Sembunyikan placeholder icon
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>

<?php include '../../include/footer.php'; ?>