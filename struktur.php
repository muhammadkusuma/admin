<?php
include 'include/header.php';
include_once 'include/koneksi.php';

// 1. Ambil Pengurus Inti (Urutan 1 sampai 10 biasanya untuk BPH)
// Kita anggap Divisi 'Pengurus Inti' adalah BPH
$q_bph = mysqli_query($koneksi, "SELECT * FROM anggota WHERE divisi='Pengurus Inti' AND urutan > 0 ORDER BY urutan ASC");

// 2. Ambil Daftar Divisi Lainnya (Yang ada anggotanya dan urutan > 0)
$q_divisi = mysqli_query($koneksi, "SELECT DISTINCT divisi FROM anggota WHERE divisi != 'Pengurus Inti' AND urutan > 0");
?>

<div class="pt-32 pb-20 bg-blue-900 text-center text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Struktur Organisasi</h1>
        <p class="text-blue-200 text-lg max-w-2xl mx-auto">Mengenal lebih dekat para penggerak Himpunan Mahasiswa Sistem
            Informasi periode ini.</p>
    </div>
</div>

<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">

        <?php if (mysqli_num_rows($q_bph) > 0) { ?>
            <div class="mb-20 text-center">
                <h2
                    class="text-2xl font-bold text-blue-900 mb-10 uppercase tracking-widest border-b-2 border-blue-200 inline-block pb-2">
                    Pengurus Inti</h2>

                <div class="flex flex-wrap justify-center gap-8 md:gap-12">
                    <?php while ($bph = mysqli_fetch_array($q_bph)) { ?>
                        <div class="w-64 group relative">
                            <div class="relative w-48 h-48 mx-auto mb-4 rounded-full p-1 border-2 border-blue-500 bg-white">
                                <?php
                                // Cek foto
                                $foto = "https://ui-avatars.com/api/?name=" . urlencode($bph['nama']) . "&background=random";
                                if ($bph['foto'] != "" && $bph['foto'] != "default.jpg") {
                                    $foto = "assets/uploads/anggota/" . $bph['foto'];
                                }
                                ?>
                                <img src="<?php echo $foto; ?>"
                                    class="w-full h-full rounded-full object-cover shadow-lg group-hover:scale-105 transition duration-500">
                            </div>
                            <h3 class="text-xl font-extrabold text-gray-900"><?php echo $bph['nama']; ?></h3>
                            <p class="text-blue-600 font-bold uppercase text-sm mt-1"><?php echo $bph['jabatan']; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php while ($kat = mysqli_fetch_array($q_divisi)) {
            $nama_divisi = $kat['divisi'];
            // Ambil anggota divisi tersebut yang urutannya > 0
            $q_anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE divisi='$nama_divisi' AND urutan > 0 ORDER BY urutan ASC");
            ?>
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-px bg-gray-300 flex-grow"></div>
                    <h2
                        class="text-xl font-bold text-gray-700 uppercase tracking-widest bg-white px-6 py-2 rounded-full shadow-sm border border-gray-100">
                        Divisi <?php echo $nama_divisi; ?>
                    </h2>
                    <div class="h-px bg-gray-300 flex-grow"></div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    <?php while ($agt = mysqli_fetch_array($q_anggota)) {
                        $foto_agt = "https://ui-avatars.com/api/?name=" . urlencode($agt['nama']) . "&background=random";
                        if ($agt['foto'] != "" && $agt['foto'] != "default.jpg") {
                            $foto_agt = "assets/uploads/anggota/" . $agt['foto'];
                        }
                        ?>
                        <div
                            class="bg-white rounded-xl shadow-sm hover:shadow-lg transition p-5 text-center border border-gray-100 group hover:-translate-y-1 duration-300">
                            <div
                                class="w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden bg-gray-100 border-2 border-transparent group-hover:border-blue-400 transition">
                                <img src="<?php echo $foto_agt; ?>" class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-bold text-gray-800 text-sm mb-1 leading-tight"><?php echo $agt['nama']; ?></h4>
                            <p
                                class="text-[10px] text-blue-500 font-bold uppercase tracking-wider bg-blue-50 inline-block px-2 py-1 rounded mt-1">
                                <?php echo $agt['jabatan']; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php include 'include/footer.php'; ?>