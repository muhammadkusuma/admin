<?php
session_start();

// Cek apakah user sudah login
if ($_SESSION['status'] != "login") {
    header("location:../login.php?pesan=belum_login");
    exit;
}

include '../include/header.php';
include '../include/koneksi.php';

// --- LOGIKA MENGHITUNG JUMLAH DATA ---

// 1. Hitung Total Berita
$query_berita = mysqli_query($koneksi, "SELECT id FROM berita");
$jml_berita = mysqli_num_rows($query_berita);

// 2. Hitung Total Anggota
$query_anggota = mysqli_query($koneksi, "SELECT id FROM anggota");
$jml_anggota = mysqli_num_rows($query_anggota);

// 3. Hitung Total Acara
$query_acara = mysqli_query($koneksi, "SELECT id FROM acara");
$jml_acara = mysqli_num_rows($query_acara);

// (Opsional) Ambil data user yang sedang login untuk foto profil
$id_user = $_SESSION['id_anggota'];
$query_user = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id_user'");
$user_login = mysqli_fetch_assoc($query_user);
?>

<div class="pt-24 pb-12 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <div
                    class="w-20 h-20 rounded-full bg-blue-200 border-4 border-white shadow-lg overflow-hidden flex-shrink-0">
                    <?php
                    // Cek foto user login
                    $foto_profil = (isset($user_login['foto']) && $user_login['foto'] != "" && $user_login['foto'] != "default.jpg")
                        ? "../assets/uploads/anggota/" . $user_login['foto']
                        : "https://ui-avatars.com/api/?name=" . urlencode($_SESSION['nama']) . "&background=0D8ABC&color=fff";
                    ?>
                    <img src="<?php echo $foto_profil; ?>" alt="Admin Profile" class="w-full h-full object-cover">
                </div>

                <div>
                    <span
                        class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wider mb-2">
                        <?php echo $_SESSION['role']; ?>
                    </span>
                    <h1 class="text-3xl font-extrabold text-gray-900 leading-none">
                        Halo, <?php echo $_SESSION['nama']; ?>!
                    </h1>
                    <p class="text-gray-500 mt-2 text-sm md:text-base">Selamat datang kembali di panel kontrol HIMASI.
                    </p>
                </div>
            </div>

            <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')"
                class="px-6 py-3 bg-white border border-red-100 text-red-600 font-bold rounded-xl hover:bg-red-50 hover:border-red-200 transition shadow-sm flex items-center gap-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

            <div
                class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <i class="far fa-newspaper text-9xl text-blue-600"></i>
                </div>
                <div class="relative z-10">
                    <div
                        class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 text-2xl mb-4">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <h3 class="text-gray-500 font-bold text-sm uppercase tracking-wider">Total Berita</h3>

                    <p class="text-4xl font-extrabold text-gray-900 mt-1"><?php echo $jml_berita; ?></p>

                    <a href="berita/index.php"
                        class="inline-block mt-4 text-sm font-bold text-blue-600 hover:underline">Kelola Berita
                        &rarr;</a>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <i class="fas fa-users text-9xl text-green-600"></i>
                </div>
                <div class="relative z-10">
                    <div
                        class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-green-600 text-2xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-gray-500 font-bold text-sm uppercase tracking-wider">Anggota Terdaftar</h3>

                    <p class="text-4xl font-extrabold text-gray-900 mt-1"><?php echo $jml_anggota; ?></p>

                    <a href="anggota/index.php"
                        class="inline-block mt-4 text-sm font-bold text-green-600 hover:underline">Data Anggota
                        &rarr;</a>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition">
                    <i class="far fa-calendar-alt text-9xl text-yellow-500"></i>
                </div>
                <div class="relative z-10">
                    <div
                        class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center text-yellow-600 text-2xl mb-4">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-gray-500 font-bold text-sm uppercase tracking-wider">Agenda Acara</h3>

                    <p class="text-4xl font-extrabold text-gray-900 mt-1"><?php echo $jml_acara; ?></p>

                    <a href="acara/index.php"
                        class="inline-block mt-4 text-sm font-bold text-yellow-600 hover:underline">Kelola Acara
                        &rarr;</a>
                </div>
            </div>

        </div>

        <h2 class="text-2xl font-extrabold text-gray-900 mb-6 flex items-center gap-2">
            <span class="w-2 h-8 bg-blue-600 rounded-full"></span> Menu Pengelolaan
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <a href="profil/index.php"
                class="bg-gray-50 hover:bg-white p-6 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition group text-center flex flex-col items-center justify-center gap-4 h-48">
                <div
                    class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition duration-300">
                    <i class="fas fa-university text-3xl text-purple-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 group-hover:text-blue-600 transition">Profil HIMA</h4>
                    <p class="text-xs text-gray-500 mt-1 px-2">Visi Misi, Sejarah & Struktur</p>
                </div>
            </a>

            <a href="berita/index.php"
                class="bg-gray-50 hover:bg-white p-6 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition group text-center flex flex-col items-center justify-center gap-4 h-48">
                <div
                    class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition duration-300">
                    <i class="fas fa-pen-nib text-3xl text-blue-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 group-hover:text-blue-600 transition">Berita & Artikel</h4>
                    <p class="text-xs text-gray-500 mt-1 px-2">Update info & prestasi</p>
                </div>
            </a>

            <a href="anggota/index.php"
                class="bg-gray-50 hover:bg-white p-6 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition group text-center flex flex-col items-center justify-center gap-4 h-48">
                <div
                    class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition duration-300">
                    <i class="fas fa-user-friends text-3xl text-green-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 group-hover:text-blue-600 transition">Data Anggota</h4>
                    <p class="text-xs text-gray-500 mt-1 px-2">Daftar pengurus & anggota</p>
                </div>
            </a>

            <a href="acara/index.php"
                class="bg-gray-50 hover:bg-white p-6 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition group text-center flex flex-col items-center justify-center gap-4 h-48">
                <div
                    class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition duration-300">
                    <i class="fas fa-calendar-check text-3xl text-yellow-500"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 group-hover:text-blue-600 transition">Agenda Acara</h4>
                    <p class="text-xs text-gray-500 mt-1 px-2">Jadwal kegiatan organisasi</p>
                </div>
            </a>

        </div>

    </div>
</div>

<?php include '../include/footer.php'; ?>