<?php
include '../../include/header.php';
include '../../include/koneksi.php';

// Cek apakah ada ID di URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM acara WHERE id='$id'");
$d = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    echo "<script>alert('Data acara tidak ditemukan!'); window.location='index.php';</script>";
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
                    <a href="index.php" class="hover:text-blue-600 transition">Agenda Acara</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Edit</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">Edit Agenda Kegiatan</h1>
            </div>
            <a href="index.php"
                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-600 font-bold rounded-xl hover:bg-gray-50 hover:text-blue-600 transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">

                <form action="proses_edit.php" method="POST" enctype="multipart/form-data" class="space-y-8">

                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Kegiatan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="<?php echo $d['judul']; ?>"
                            class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <select name="kategori"
                                    class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer"
                                    required>
                                    <option value="Seminar" <?php if ($d['kategori'] == 'Seminar')
                                        echo 'selected'; ?>>
                                        Seminar</option>
                                    <option value="Workshop" <?php if ($d['kategori'] == 'Workshop')
                                        echo 'selected'; ?>>
                                        Workshop</option>
                                    <option value="Rapat" <?php if ($d['kategori'] == 'Rapat')
                                        echo 'selected'; ?>>Rapat
                                        Rutin</option>
                                    <option value="Lomba" <?php if ($d['kategori'] == 'Lomba')
                                        echo 'selected'; ?>>
                                        Perlombaan</option>
                                    <option value="Gathering" <?php if ($d['kategori'] == 'Gathering')
                                        echo 'selected'; ?>>
                                        Gathering / Makrab</option>
                                    <option value="Lainnya" <?php if ($d['kategori'] == 'Lainnya')
                                        echo 'selected'; ?>>
                                        Lainnya</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                    <i class="fas fa-chevron-down text-xs"></i></div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Status Kegiatan</label>
                            <div class="relative">
                                <select name="status"
                                    class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer"
                                    required>
                                    <option value="Akan Datang" <?php if ($d['status'] == 'Akan Datang')
                                        echo 'selected'; ?>>Akan Datang</option>
                                    <option value="Selesai" <?php if ($d['status'] == 'Selesai')
                                        echo 'selected'; ?>>
                                        Selesai / Terlaksana</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                    <i class="fas fa-chevron-down text-xs"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Pelaksanaan</label>
                            <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>"
                                class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jam Mulai</label>
                            <input type="time" name="jam" value="<?php echo $d['jam']; ?>"
                                class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi / Tempat <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>"
                            class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Poster Kegiatan</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-auto border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition group relative overflow-hidden p-6">

                                <div class="flex flex-col items-center justify-center text-center">
                                    <?php
                                    $imgSrc = ($d['poster'] != "") ? "../../assets/uploads/acara/" . $d['poster'] : "";
                                    $isHidden = ($d['poster'] == "") ? "hidden" : "";
                                    $placeholderHidden = ($d['poster'] != "") ? "hidden" : "";
                                    ?>

                                    <img id="preview-image" src="<?php echo $imgSrc; ?>"
                                        class="<?php echo $isHidden; ?> h-48 object-contain rounded-lg shadow-sm z-10 mb-4" />

                                    <div id="upload-placeholder" class="<?php echo $placeholderHidden; ?>">
                                        <i
                                            class="fas fa-image text-4xl text-gray-400 mb-3 group-hover:text-blue-500 transition"></i>
                                        <p class="mb-2 text-sm text-gray-500"><span
                                                class="font-semibold text-blue-600">Klik untuk ganti poster</span></p>
                                        <p class="text-xs text-gray-400">Biarkan jika tidak ingin mengubah</p>
                                    </div>
                                </div>

                                <input id="dropzone-file" type="file" name="poster" class="hidden" accept="image/*"
                                    onchange="previewFile()" />
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="6"
                            class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition leading-relaxed"><?php echo $d['deskripsi']; ?></textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex items-center gap-4">
                        <button type="submit" name="update"
                            class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition w-full md:w-auto flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
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
            preview.src = reader.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }, false);

        if (file) { reader.readAsDataURL(file); }
    }
</script>

<?php include '../../include/footer.php'; ?>