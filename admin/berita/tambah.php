<?php
// FILE: admin/berita/tambah.php
session_start();
include '../../includes/koneksi.php';

// Cek Login
if($_SESSION['status'] != "login" || $_SESSION['role'] != "admin"){
    header("location:../../login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Background & Glassmorphism Style (Sama dengan Dashboard) */
        .admin-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
            min-height: 100vh;
            color: white;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }
        
        /* Input Styling */
        .glass-input {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 12px 16px;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.3s;
        }
        .glass-input:focus {
            background: rgba(0, 0, 0, 0.4);
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }
        .glass-input::placeholder { color: rgba(255, 255, 255, 0.4); }
        
        /* Select Option (agar tetap terbaca di background putih browser default) */
        option { background-color: #1e293b; color: white; }
    </style>
</head>
<body class="admin-bg flex items-center justify-center p-6">

    <div class="glass-card w-full max-w-4xl p-8 relative">
        
        <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-6">
            <div>
                <h2 class="text-3xl font-bold text-white tracking-tight">Buat Berita Baru</h2>
                <p class="text-blue-200 text-sm mt-1">Publikasikan informasi terbaru untuk mahasiswa.</p>
            </div>
            <a href="index.php" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            
            <div>
                <label class="block text-sm font-bold text-blue-300 mb-2">Judul Berita</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-heading text-gray-400"></i>
                    </div>
                    <input type="text" name="judul" class="glass-input pl-12" placeholder="Contoh: Seminar Nasional Teknologi 2025" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Kategori</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-tag text-gray-400"></i>
                        </div>
                        <select name="kategori" class="glass-input pl-12 cursor-pointer" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <option value="Berita Umum">Berita Umum</option>
                            <option value="Berita Mahasiswa">Berita Mahasiswa</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Hari Kegiatan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-day text-gray-400"></i>
                        </div>
                        <input type="text" name="hari" class="glass-input pl-12" placeholder="Contoh: Senin">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Tanggal</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <input type="date" name="tanggal" class="glass-input pl-12" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Gambar Utama</label>
                    <div class="relative">
                        <input type="file" name="gambar" class="glass-input file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer" required>
                    </div>
                    <p class="text-xs text-gray-400 mt-1 ml-1">*Format: JPG, PNG, WEBP (Max 2MB)</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-blue-300 mb-2">Isi Berita</label>
                <textarea name="isi" rows="8" class="glass-input" placeholder="Tuliskan detail berita atau artikel di sini..." required></textarea>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" name="simpan" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 transition duration-300 w-full md:w-auto">
                    <i class="fas fa-paper-plane mr-2"></i> Publikasikan
                </button>
                <button type="reset" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl transition duration-300">
                    Reset Form
                </button>
            </div>

        </form>
    </div>

</body>
</html>