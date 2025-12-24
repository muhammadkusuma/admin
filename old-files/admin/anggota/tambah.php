<?php
session_start();
// Cek apakah user adalah admin
if($_SESSION['role'] != "admin"){ 
    header("location:../../login.php"); 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengurus Baru - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg border-t-4 border-blue-600">
        
        <div class="mb-6 border-b pb-4 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Registrasi Pengurus Baru</h2>
                <p class="text-gray-500 text-sm">Silakan lengkapi data anggota himpunan di bawah ini.</p>
            </div>
            <a href="index.php" class="text-gray-500 hover:text-gray-700">❌ Batal</a>
        </div>
        
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">NIM (Nomor Induk Mahasiswa)</label>
                    <input type="number" name="nim" placeholder="Contoh: 1195011xxxx" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm transition" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Beserta Gelar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm transition" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan Struktur</label>
                    <select name="jabatan" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm bg-white" required>
                        <option value="" disabled selected>- Pilih Jabatan -</option>
                        <option value="Ketua Himpunan">Bupati HIMASI</option>
                        <option value="Wakil Ketua">Wakil Bupati HIMASI</option>
                        <option value="Sekretaris Umum">Sekretaris Jendral</option>
                        <option value="Sekretaris 2">Sekretaris 2</option>
                        <option value="Bendahara Umum">Bendahara Umum</option>
                        <option value="Bendahara 1">Bendahara 2</option>
                        <option value="Kepala Divisi">Kepala Divisi</option>
                        <!-- <option value="Anggota Divisi">Anggota Divisi</option> -->
                    
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Divisi (Opsional)</label>
                    <select name="divisi" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm bg-white">
                        <option value="-">- Tidak Masuk Divisi -</option>
                        <option value="Medkominfo">Divisi Media Komunikasi dan Informasi</option>
                        <option value="Hubungan Luar Kerjasama">Divisi Hubungan Luar dan Kerjasama</option>
                        <option value="Kaderisasi"> Divisi Kaderisasi</option>
                        <option value="Keagamaan">Divisi Keagamaan</option>
                        <option value="Minat Bakat">Divisi Minat Bakat </option>
                        <option value="Advokesma">Divisi Advokesma</option>
                        <option value="Kesekretariatan">Biro Kesekretariatan</option>
                        <option value="Advokesma">Divisi Advokesma</option>
                        <option value="Kewirausahaan">Divisi Kewirausahaan</option>
                        <option value="Sarana Prasarana">Divisi Sarana dan Prasarana</option>
                        <option value="Pristek">Divisi Pendidikan,Riset dan Teknologi</option>
                    </select>
                    <p class="text-xs text-gray-400 mt-1">*Pilih "-" jika dia adalah Ketua/Wakil/Sekretaris/Bendahara Inti.</p>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Upload Foto Profil</label>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                            <p class="text-xs text-gray-500">JPG, PNG, atau JPEG (Maks. 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="foto" class="hidden" accept=".jpg, .jpeg, .png" />
                    </label>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password Login</label>
                <div class="relative">
                    <input type="text" name="password" value="12345" class="w-full px-4 py-2 border bg-gray-100 text-gray-500 rounded-lg focus:outline-none shadow-sm" readonly>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <span class="text-gray-400 text-xs italic">Default Password</span>
                    </div>
                </div>
                <p class="text-xs text-red-500 mt-1">*Password default adalah <b>12345</b>. Anggota bisa menggantinya nanti setelah login.</p>
            </div>

            <div class="flex justify-end gap-3 border-t pt-6">
                <a href="index.php" class="px-6 py-2 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    💾 Simpan Data
                </button>
            </div>

        </form>
    </div>

    <script>
        const fileInput = document.getElementById('dropzone-file');
        const dropzoneLabel = document.querySelector('label[for="dropzone-file"] p span');

        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                dropzoneLabel.textContent = "File terpilih: " + e.target.files[0].name;
                dropzoneLabel.parentElement.classList.add('text-blue-600');
            }
        });
    </script>

</body>
</html>