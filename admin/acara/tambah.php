<?php
// FILE: admin/acara/tambah.php
include '../../includes/koneksi.php';

if (isset($_POST['simpan'])) {
    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $tanggal = $_POST['tanggal'];
    $lokasi  = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);

    // Upload Poster
    $filename = $_FILES['gambar']['name'];

    if ($filename != "") {
        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'webp');
        $x = explode('.', $filename);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $nama_baru = rand(1, 999) . '-' . $filename;

        if (in_array($ekstensi, $ekstensi_izin) === true) {
            move_uploaded_file($file_tmp, '../../assets/img/' . $nama_baru);

            $query = "INSERT INTO acara (judul_acara, tanggal_pelaksanaan, lokasi, deskripsi, poster) 
                      VALUES ('$judul', '$tanggal', '$lokasi', '$isi', '$nama_baru')";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>alert('Acara berhasil ditambahkan!');window.location='index.php';</script>";
            } else {
                echo "<script>alert('Gagal simpan database!');</script>";
            }
        } else {
            echo "<script>alert('Format gambar harus JPG/PNG/WEBP!');</script>";
        }
    } else {
        echo "<script>alert('Wajib upload poster acara!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Tambah Acara - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <div class="mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">Input Agenda Acara</h2>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kategori Acara</label>
                <select name="kategori" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="PBAK">PBAK (Pengenalan Budaya Akademik)</option>
                    <option value="Fortasi">Fortasi (Forum Taaruf)</option>
                    <option value="KBM-SI">KBM-SI (Kemah Bhakti Mahasiswa)</option>
                    <option value="LK">Latihan Kepemimpinan</option>
                    <option value="PO">Pendidikan Organisasi</option>
                    <option value="Lainnya">Agenda Lainnya</option>
                </select>
            </div>
            <div>
                <label class="block mb-2 font-bold text-gray-700">Nama Acara</label>
                <input type="text" name="judul" required class="w-full p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal" required class="w-full p-3 border rounded-lg bg-gray-50 outline-none">
                </div>
                <div>
                    <label class="block mb-2 font-bold text-gray-700">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Contoh: Gedung PKM / Zoom Meeting" required class="w-full p-3 border rounded-lg bg-gray-50 outline-none">
                </div>
            </div>

            <div>
                <label class="block mb-2 font-bold text-gray-700">Poster Acara</label>
                <input type="file" name="gambar" required class="w-full p-2 border rounded-lg bg-gray-50">
            </div>

            <div>
                <label class="block mb-2 font-bold text-gray-700">Deskripsi Singkat</label>
                <textarea name="isi" rows="5" required class="w-full p-3 border rounded-lg bg-gray-50 outline-none"></textarea>
            </div>

            <button type="submit" name="simpan" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition w-full md:w-auto">
                Simpan Acara

            </button>
        </form>
    </div>
</body>

</html>