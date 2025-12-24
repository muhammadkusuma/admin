<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - HIMASI UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">

    <div class="min-h-screen flex items-center justify-center p-4">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-4xl flex flex-col md:flex-row">

            <div class="w-full md:w-1/2 relative bg-blue-900 hidden md:block">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                    alt="Login Visual" class="absolute inset-0 w-full h-full object-cover opacity-60">

                <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/40 to-transparent"></div>

                <div class="absolute bottom-0 left-0 p-10 text-white z-10">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Logo_UIN_Suska_Riau.png/1200px-Logo_UIN_Suska_Riau.png"
                            alt="Logo UIN" class="h-10 w-auto bg-white/20 rounded-full p-1 backdrop-blur-sm">
                        <span
                            class="font-bold tracking-widest text-xs uppercase bg-blue-500/30 px-3 py-1 rounded-full border border-blue-400/30 backdrop-blur-md">Admin
                            Area</span>
                    </div>
                    <h2 class="text-3xl font-extrabold leading-tight mb-2">Selamat Datang Kembali!</h2>
                    <p class="text-blue-100 text-sm leading-relaxed opacity-90">Silakan masuk untuk mengelola konten
                        website, berita, dan data anggota HIMASI.</p>
                </div>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center">

                <div class="text-center md:text-left mb-8">
                    <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Login Akun</h1>
                    <p class="text-gray-500 text-sm">Masukan NIM dan Password untuk melanjutkan.</p>
                </div>

                <form action="cek_login.php" method="POST" class="space-y-5">

                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo '<div class="bg-red-50 border border-red-200 text-red-600 text-xs font-bold px-4 py-3 rounded-xl flex items-center gap-2">
                                    <i class="fas fa-exclamation-circle"></i> Login Gagal! Username atau Password salah.
                                  </div>';
                        } else if ($_GET['pesan'] == "logout") {
                            echo '<div class="bg-green-50 border border-green-200 text-green-600 text-xs font-bold px-4 py-3 rounded-xl flex items-center gap-2">
                                    <i class="fas fa-check-circle"></i> Anda telah berhasil logout.
                                  </div>';
                        } else if ($_GET['pesan'] == "belum_login") {
                            echo '<div class="bg-yellow-50 border border-yellow-200 text-yellow-600 text-xs font-bold px-4 py-3 rounded-xl flex items-center gap-2">
                                    <i class="fas fa-exclamation-triangle"></i> Silakan login untuk mengakses halaman admin.
                                  </div>';
                        }
                    }
                    ?>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Username / NIM</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="username"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-gray-800 placeholder-gray-400"
                                placeholder="Contoh: 1195011XXXX" required>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-bold text-gray-700">Password</label>
                            <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-800 hover:underline">Lupa
                                Password?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="passwordInput"
                                class="w-full pl-11 pr-12 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-gray-800 placeholder-gray-400"
                                placeholder="••••••••" required>

                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1">
                        Masuk Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </button>

                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-500 text-sm">
                        Bukan pengurus?
                        <a href="index.php"
                            class="font-bold text-blue-600 hover:text-blue-800 hover:underline transition">Kembali ke
                            Beranda</a>
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <p class="text-xs text-gray-400">© 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>