<?php
// FILE: admin/berita/edit.php
session_start();
include '../../includes/koneksi.php';

// Cek Login
if($_SESSION['status'] != "login" || $_SESSION['role'] != "admin"){
    header("location:../../login.php?pesan=belum_login");
}

// Ambil ID dari URL
if(!isset($_GET['id'])){
    header("location:index.php");
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = '$id'");
$data = mysqli_fetch_array($query);

// Jika data tidak ditemukan
if(mysqli_num_rows($query) < 1){
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita - Admin HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .admin-bg { background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%); min-height: 100vh; color: white; }
        .glass-card { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1.5rem; }
        .glass-input { background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(255, 255, 255, 0.1); color: white; padding: 12px 16px; border-radius: 0.75rem; width: 100%; transition: all 0.3s; }
        .glass-input:focus { background: rgba(0, 0, 0, 0.4); border-color: #3b82f6; outline: none; }
        option { background-color: #1e293b; color: white; }
    </style>
</head>
<body class="admin-bg flex items-center justify-center p-6">

    <div class="glass-card w-full max-w-4xl p-8">
        
        <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-6">
            <div>
                <h2 class="text-3xl font-bold text-white">Edit Berita</h2>
                <p class="text-blue-200 text-sm mt-1">Perbarui informasi berita ini.</p>
            </div>
            <a href="index.php" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Batal
            </a>
        </div>

        <form action="proses_edit.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            
            <input type="hidden" name="id_berita" value="<?php echo $data['id_berita']; ?>">

            <div>
                <label class="block text-sm font-bold text-blue-300 mb-2">Judul Berita</label>
                <input type="text" name="judul" class="glass-input" value="<?php echo $data['judul']; ?>" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Kategori</label>
                    <select name="kategori" class="glass-input cursor-pointer" required>
                        <option value="Berita Umum" <?php if($data['kategori'] == 'Berita Umum') echo 'selected'; ?>>Berita Umum</option>
                        <option value="Berita Mahasiswa" <?php if($data['kategori'] == 'Berita Mahasiswa') echo 'selected'; ?>>Berita Mahasiswa</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Hari Kegiatan</label>
                    <input type="text" name="hari" class="glass-input" value="<?php echo $data['hari']; ?>" placeholder="Contoh: Senin">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" class="glass-input" value="<?php echo $data['tanggal']; ?>" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-blue-300 mb-2">Ganti Gambar (Opsional)</label>
                    <div class="flex items-center gap-3">
                        <img src="../../assets/img/<?php echo $data['gambar']; ?>" class="w-12 h-12 object-cover rounded border border-white/20">
                        <input type="file" name="gambar" class="glass-input text-sm">
                    </div>
                    <p class="text-xs text-gray-400 mt-1">*Biarkan kosong jika tidak ingin mengganti gambar.</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-blue-300 mb-2">Isi Berita</label>
                <textarea name="isi" rows="8" class="glass-input" required><?php echo $data['isi_berita']; ?></textarea>
            </div>

            <div class="pt-4 border-t border-white/10">
                <button type="submit" name="update" class="px-8 py-3 bg-yellow-600 hover:bg-yellow-500 text-white font-bold rounded-xl shadow-lg shadow-yellow-500/30 transform hover:-translate-y-1 transition duration-300 w-full md:w-auto">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</body>
</html>