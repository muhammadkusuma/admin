<?php
include '../../include/header.php';
include '../../include/koneksi.php';

// Cek ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'");
$d = mysqli_fetch_assoc($query);

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
                    <a href="index.php" class="hover:text-blue-600 transition">Data Anggota</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Edit</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">Edit Data Anggota</h1>
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
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 md:p-10">

            <form action="proses_edit.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            required>
                    </div>
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">NIM <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nim" value="<?php echo $d['nim']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan" value="<?php echo $d['jabatan']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Urutan Tampil</label>
                        <input type="number" name="urutan" value="<?php echo $d['urutan']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Isi angka (1, 2, 3...) agar muncul di Struktur Organisasi.
                            Isi 0 untuk sembunyikan.</p>
                    </div>


                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Divisi <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="divisi"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer">
                                <option value="<?php echo $d['divisi']; ?>" selected class="bg-blue-50 font-bold">
                                    <?php echo $d['divisi']; ?> (Saat Ini)</option>
                                <option value="Pengurus Inti">Pengurus Inti</option>
                                <option value="Kominfo">Kominfo</option>
                                <option value="Kaderisasi">Kaderisasi</option>
                                <option value="Minat Bakat">Minat Bakat</option>
                                <option value="Keagamaan">Keagamaan</option>
                                <option value="Humas">Humas</option>
                                <option value="Kwirausahaan">Kewirausahaan</option>
                                <option value="Riset Teknologi">Riset Teknologi</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-xs"></i></div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Angkatan <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="angkatan" value="<?php echo $d['angkatan']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            required>
                    </div>
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="<?php echo $d['no_hp']; ?>"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-6">
                    <label class="block font-bold mb-4 text-gray-700">Foto Profil</label>

                    <div
                        class="flex flex-col md:flex-row items-center gap-6 bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300">
                        <div class="shrink-0 relative group">
                            <?php
                            $path_foto = "../../assets/uploads/anggota/" . $d['foto'];
                            if ($d['foto'] != "" && $d['foto'] != "default.jpg" && file_exists($path_foto)) {
                                $src_foto = $path_foto;
                            } else {
                                $src_foto = "https://ui-avatars.com/api/?name=" . urlencode($d['nama']) . "&background=eff6ff&color=2563eb&size=200";
                            }
                            ?>
                            <img id="preview-foto" src="<?php echo $src_foto; ?>"
                                class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md group-hover:scale-105 transition duration-300">

                            <div
                                class="absolute bottom-0 right-0 bg-blue-600 text-white p-1.5 rounded-full text-xs shadow-sm border-2 border-white">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>

                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto Baru</label>
                            <input type="file" name="foto" onchange="previewImage(this)" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2.5 file:px-4
                                file:rounded-xl file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-600 file:text-white
                                hover:file:bg-blue-700 transition cursor-pointer
                            " accept="image/*" />
                            <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, WEBP. Maksimal 2MB. (Biarkan kosong
                                jika tidak ingin mengganti)</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex gap-4">
                    <button type="submit"
                        class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 w-full md:w-auto">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="index.php"
                        class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition w-full md:w-auto text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Ubah src gambar preview dengan file yang baru dipilih
                document.getElementById('preview-foto').src = e.target.result;
            }

            // Membaca file sebagai URL data
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php include '../../include/footer.php'; ?>