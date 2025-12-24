<?php
// FILE: admin/acara/index.php
include '../../includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Acara - Admin HIMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <a href="logout.php" class="...">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <div class="flex justify-between items-center mb-8 pb-4 border-b">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Acara</h2>
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Acara
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6">Poster</th>
                        <th class="py-3 px-6">Nama Acara</th>
                        <th class="py-3 px-6">Waktu & Lokasi</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM acara ORDER BY tanggal_pelaksanaan DESC");

                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                <td class="py-3 px-6 text-center font-bold"><?php echo $no++; ?></td>
                                <td class="py-3 px-6">
                                    <img src="../../assets/img/<?php echo $data['poster']; ?>" class="h-16 w-16 object-cover rounded shadow-sm border">
                                </td>
                                <td class="py-3 px-6">
                                    <span class="font-bold text-gray-800 text-base block"><?php echo $data['judul_acara']; ?></span>
                                </td>
                                <td class="py-3 px-6">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-blue-600 font-bold">
                                            <i class="fas fa-calendar-alt mr-1"></i> <?php echo date('d M Y', strtotime($data['tanggal_pelaksanaan'])); ?>
                                        </span>
                                        <span class="text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1 text-red-500"></i> <?php echo $data['lokasi']; ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center gap-2">
                                        <a href="edit.php?id=<?php echo $data['id_acara']; ?>" class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <a href="hapus.php?id=<?php echo $data['id_acara']; ?>"
                                            class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 transition"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus acara ini?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center py-6 text-gray-400'>Belum ada data acara.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-right">
            <a href="../index.php" class="text-gray-500 hover:text-blue-600 text-sm font-semibold">Kembali ke Dashboard Utama</a>
        </div>

    </div>

</body>

</html>