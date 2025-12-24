<?php 
// TIDAK ADA Session Start atau Cek Login
include 'includes/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between">
            <a href="index.php" class="font-bold text-blue-700 text-xl">HIMA SI</a>
            <a href="index.php" class="text-gray-600 hover:text-blue-600 font-medium">Kembali ke Beranda</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 mt-10 mb-20 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <img src="assets/img/<?php echo $data['gambar']; ?>" class="w-full h-[400px] object-cover">
            
            <div class="p-8 md:p-12">
                <span class="text-gray-500 text-sm">Diposting pada <?php echo date('d F Y', strtotime($data['tanggal'])); ?></span>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mt-2 mb-8 leading-tight">
                    <?php echo $data['judul']; ?>
                </h1>
                
                <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                    <?php echo nl2br($data['isi_berita']); ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>