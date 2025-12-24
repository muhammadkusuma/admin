<?php 
include '../../include/header.php'; 
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
                    <span class="text-blue-600 font-semibold">Tambah</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Tambah Agenda Baru
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
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="alert('Data agenda belum disimpan (Mode Demo)'); return false;">
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Kegiatan <span class="text-red-500">*</span></label>
                            <input type="text" name="judul" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition placeholder-gray-400" placeholder="Contoh: Workshop Web Development" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="kategori" class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer" required>
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        <option value="Seminar">Seminar</option>
                                        <option value="Workshop">Workshop</option>
                                        <option value="Rapat">Rapat Rutin</option>
                                        <option value="Lomba">Perlombaan</option>
                                        <option value="Gathering">Gathering / Makrab</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Pelaksanaan <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Jam Mulai</label>
                                <input type="time" name="jam" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi / Tempat <span class="text-red-500">*</span></label>
                                <input type="text" name="lokasi" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition placeholder-gray-400" placeholder="Contoh: Gedung PKM UIN Suska" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Poster / Banner Kegiatan</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                        <img id="preview-image" class="hidden h-40 object-contain mb-3 rounded-lg shadow-sm" />
                                        <div id="upload-placeholder">
                                            <i class="fas fa-image text-4xl text-gray-400 mb-3 group-hover:text-blue-500 transition"></i>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold text-blue-600">Klik untuk upload</span> atau drag and drop</p>
                                            <p class="text-xs text-gray-400">Rasio disarankan Potrait (9:16) atau Square (1:1)</p>
                                        </div>
                                    </div>
                                    <input id="dropzone-file" type="file" name="poster" class="hidden" accept="image/*" onchange="previewFile()" />
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi" rows="6" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition leading-relaxed" placeholder="Jelaskan detail kegiatan, persyaratan peserta, dll..."></textarea>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex items-center gap-4">
                            <button type="submit" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition w-full md:w-auto flex justify-center items-center gap-2">
                                <i class="fas fa-save"></i> Simpan Agenda
                            </button>
                            <button type="reset" class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition w-full md:w-auto">
                                Reset
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
        preview.src = reader.result;
        preview.classList.remove('hidden');
        placeholder.classList.add('hidden');
    }, false);

    if (file) { reader.readAsDataURL(file); }
}
</script>

<?php include '../../include/footer.php'; ?>