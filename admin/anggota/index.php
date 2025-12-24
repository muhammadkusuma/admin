<?php
// FILE: admin/anggota/index.php
include '../../includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota & Pengurus - Admin HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-100 p-6 md:p-8">

    <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b pb-4 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Anggota</h2>
                <p class="text-gray-500 text-sm">Kelola seluruh data pengurus dan anggota HIMASI.</p>
            </div>
            
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition flex items-center gap-2 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <i class="fas fa-plus"></i> Tambah Anggota Baru
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse bg-white">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold leading-normal tracking-wider">
                    <tr>
                        <th class="py-4 px-6 text-center border-b">No</th>
                        <th class="py-4 px-6 text-center border-b">Foto</th>
                        <th class="py-4 px-6 border-b">Identitas (Nama & NIM)</th>
                        <th class="py-4 px-6 border-b">Jabatan</th>
                        <th class="py-4 px-6 border-b">Divisi</th>
                        <th class="py-4 px-6 text-center border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-medium">
                    <?php
                    // Mengambil data, diurutkan berdasarkan nama_lengkap
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM users ORDER BY nama_lengkap ASC");
                    
                    if(mysqli_num_rows($query) > 0){
                        while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-blue-50/50 transition duration-200">
                        
                        <td class="py-4 px-6 text-center text-gray-500"><?php echo $no++; ?></td>
                        
                        <td class="py-4 px-6 text-center">
                            <?php if(!empty($data['foto']) && file_exists("../../assets/img/".$data['foto'])): ?>
                                <img src="../../assets/img/<?php echo $data['foto']; ?>" 
                                     class="h-12 w-12 rounded-full object-cover mx-auto border-2 border-white shadow-sm ring-1 ring-gray-200 hover:scale-110 transition cursor-pointer"
                                     alt="Foto">
                            <?php else: ?>
                                <div class="h-12 w-12 rounded-full bg-gray-200 mx-auto flex items-center justify-center text-gray-400 border-2 border-white shadow-sm">
                                    <i class="fas fa-user text-lg"></i>
                                </div>
                            <?php endif; ?>
                        </td>

                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-bold text-base"><?php echo htmlspecialchars($data['nama_lengkap']); ?></span>
                                <span class="text-gray-500 text-xs font-mono mt-0.5 tracking-wide">
                                    <i class="fas fa-id-card mr-1 text-gray-400"></i><?php echo $data['nim']; ?>
                                </span>
                            </div>
                        </td>

                        <td class="py-4 px-6">
                            <?php 
                                $bg_jabatan = "bg-blue-100 text-blue-800";
                                if($data['jabatan'] == 'Ketua Umum' || $data['jabatan'] == 'Wakil Ketua') $bg_jabatan = "bg-purple-100 text-purple-800";
                                if($data['jabatan'] == 'Sekretaris' || $data['jabatan'] == 'Bendahara') $bg_jabatan = "bg-green-100 text-green-800";
                            ?>
                            <span class="<?php echo $bg_jabatan; ?> py-1.5 px-3 rounded-full text-xs font-bold inline-block shadow-sm">
                                <?php echo $data['jabatan']; ?>
                            </span>
                        </td>

                        <td class="py-4 px-6">
                            <?php if($data['divisi'] != '-' && $data['divisi'] != ''): ?>
                                <span class="text-gray-700 font-semibold"><i class="fas fa-users mr-1.5 text-gray-400"></i><?php echo $data['divisi']; ?></span>
                            <?php else: ?>
                                <span class="text-gray-400 italic text-xs">- Non Divisi -</span>
                            <?php endif; ?>
                        </td>

                        <td class="py-4 px-6 text-center">
                            <div class="flex item-center justify-center gap-3">
                                <a href="edit.php?id=<?php echo $data['id_user']; ?>" 
                                   class="group w-9 h-9 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white transition shadow-sm" 
                                   title="Edit Data">
                                    <i class="fas fa-pen text-sm"></i>
                                </a>
                                
                                <a href="hapus.php?id=<?php echo $data['id_user']; ?>" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data <?php echo $data['nama_lengkap']; ?>?')" 
                                   class="group w-9 h-9 rounded-lg bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-500 hover:text-white transition shadow-sm"
                                   title="Hapus Data">
                                    <i class="fas fa-trash-alt text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='6' class='text-center py-10 text-gray-400 italic bg-gray-50'>Belum ada data anggota.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 flex justify-between items-center text-sm text-gray-500">
            <div>
                Total Anggota: <span class="font-bold text-gray-800"><?php echo mysqli_num_rows($query); ?></span> Orang
            </div>
            <a href="../index.php" class="hover:text-blue-600 font-semibold flex items-center gap-1 transition">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

    </div>

</body>
</html>