<?php
session_start();
include '../../includes/koneksi.php'; 

// Cek keamanan
if($_SESSION['status'] != "login" || $_SESSION['role'] != "admin"){
    header("location:../../login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Berita - Admin HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Tema Gelap & Glassmorphism */
        .admin-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
            min-height: 100vh;
            color: white;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
        }
        
        /* Table Styling khusus Dark Mode */
        .table-glass th {
            background-color: rgba(255, 255, 255, 0.1);
            color: #bfdbfe;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        .table-glass td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #e2e8f0;
        }
        .table-glass tr:hover td {
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="admin-bg">

    <nav class="fixed w-full z-50 top-0 px-6 py-4 bg-slate-900/80 backdrop-blur-md border-b border-white/5">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../index.php" class="text-blue-300 hover:text-white transition font-bold flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <div class="text-white font-bold text-lg">Manajemen Berita</div>
        </div>
    </nav>

    <div class="container mx-auto px-6 pt-24 pb-12">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white">Daftar Berita</h1>
                <p class="text-blue-200 text-sm">Kelola artikel, berita, dan informasi seputar kampus.</p>
            </div>
            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-900/40 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Berita Baru
            </a>
        </div>

        <div class="glass-card overflow-hidden overflow-x-auto shadow-2xl">
            <table class="min-w-full table-glass">
                <thead>
                    <tr>
                        <th class="py-4 px-6 text-left w-16">No</th>
                        <th class="py-4 px-6 text-left">Judul Berita</th>
                        <th class="py-4 px-6 text-center">Kategori</th>
                        <th class="py-4 px-6 text-center">Tanggal</th>
                        <th class="py-4 px-6 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
                    
                    if(mysqli_num_rows($query) > 0){
                        while($data = mysqli_fetch_array($query)){
                            // Logika Warna Badge Kategori
                            $kat = $data['kategori'];
                            $badge_color = "bg-gray-600 text-gray-200"; // Default
                            
                            if($kat == 'Seputar Kampus') $badge_color = "bg-purple-500/20 text-purple-300 border border-purple-500/30";
                            elseif($kat == 'Teknologi') $badge_color = "bg-blue-500/20 text-blue-300 border border-blue-500/30";
                            elseif($kat == 'Kabar HIMASI') $badge_color = "bg-yellow-500/20 text-yellow-300 border border-yellow-500/30";
                            elseif($kat == 'Prestasi') $badge_color = "bg-green-500/20 text-green-300 border border-green-500/30";
                    ?>
                    <tr class="transition duration-300">
                        <td class="py-4 px-6 text-center"><?php echo $no++; ?></td>
                        
                        <td class="py-4 px-6">
                            <span class="font-semibold block text-white text-lg"><?php echo $data['judul']; ?></span>
                            <span class="text-xs text-gray-400 line-clamp-1 mt-1">
                                <?php echo substr(strip_tags($data['isi_berita']), 0, 60); ?>...
                            </span>
                        </td>

                        <td class="py-4 px-6 text-center">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold <?php echo $badge_color; ?>">
                                <?php echo ($kat != '') ? $kat : 'Umum'; ?>
                            </span>
                        </td>

                        <td class="py-4 px-6 text-center text-sm text-gray-300">
                            <?php echo date('d M Y', strtotime($data['tanggal'])); ?>
                        </td>

                        <td class="py-4 px-6 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="edit.php?id=<?php echo $data['id_berita']; ?>" class="p-2 bg-yellow-600/20 hover:bg-yellow-600 text-yellow-400 hover:text-white rounded-lg transition border border-yellow-600/30" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="proses_hapus.php?id=<?php echo $data['id_berita']; ?>" class="p-2 bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white rounded-lg transition border border-red-600/30" onclick="return confirm('Yakin hapus berita ini?')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' class='py-8 text-center text-gray-400 italic'>Belum ada data berita.</td></tr>";
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>