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
                    <a href="index.php" class="hover:text-blue-600 transition">Data Anggota</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Tambah</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Tambah Anggota Baru
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
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8" onsubmit="alert('Data belum disimpan (Mode Demo)'); return false;">
                        
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Informasi Pribadi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Nama Lengkap" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">NIM <span class="text-red-500">*</span></label>
                                    <input type="text" name="nim" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Nomor Induk Mahasiswa" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Angkatan <span class="text-red-500">*</span></label>
                                    <input type="number" name="angkatan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Tahun Masuk (Contoh: 2024)" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nomor HP / WhatsApp</label>
                                    <input type="text" name="no_hp" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="0812xxxxxxx">
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Jabatan & Divisi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan</label>
                                    <input type="text" name="jabatan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Contoh: Kepala Divisi, Anggota">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Divisi <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="divisi" class="w-full pl-5 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer" required>
                                            <option value="" disabled selected>-- Pilih Divisi --</option>
                                            <option value="Pengurus Inti">Pengurus Inti</option>
                                            <option value="Kominfo">Kominfo (Media & Informasi)</option>
                                            <option value="Kaderisasi">Kaderisasi</option>
                                            <option value="Minat Bakat">Minat & Bakat</option>
                                            <option value="Keagamaan">Keagamaan</option>
                                            <option value="Humas">Hubungan Masyarakat</option>
                                            <option value="Kwirausahaan">Kewirausahaan</option>
                                            <option value="Riset Teknologi">Riset & Teknologi</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Foto Profil</h3>
                            <div class="flex items-center gap-6">
                                <div class="shrink-0">
                                    <img id="preview-foto" class="h-24 w-24 object-cover rounded-full border-2 border-gray-200" src="https://ui-avatars.com/api/?name=User&background=eff6ff&color=1d4ed8" alt="Current profile photo" />
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" name="foto" onchange="previewImage(this)" class="block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100 transition cursor-pointer
                                    "/>
                                    <p class="mt-2 text-xs text-gray-500">JPG, PNG atau WEBP (Max. 2MB). Disarankan rasio 1:1.</p>
                                </label>
                            </div>
                        </div>

                        <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-100">
                            <h3 class="text-sm font-bold text-yellow-800 mb-2"><i class="fas fa-lock mr-2"></i>Pengaturan Akun Login</h3>
                            <p class="text-xs text-yellow-700 mb-4">Password default untuk anggota baru adalah <strong>nim123</strong>. Anggota dapat menggantinya nanti.</p>
                            
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="buat_akun" id="buat_akun" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" checked>
                                <label for="buat_akun" class="text-sm font-medium text-gray-700">Aktifkan akun login untuk anggota ini</label>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex items-center gap-4">
                            <button type="submit" class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition w-full md:w-auto">
                                <i class="fas fa-save mr-2"></i> Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-foto').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php include '../../include/footer.php'; ?>