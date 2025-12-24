<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himpunan Mahasiswa Sistem Informasi - UIN Suska Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .fade-in-up {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bounce-slow {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(10px);
            }
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="glass-nav fixed top-0 z-50 w-full transition-all duration-300 shadow-sm">
        <div class="w-full px-4 md:px-8 py-3">
            <div class="flex justify-between items-center">
                <a class="flex items-center gap-3 group" href="index.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Logo_UIN_Suska_Riau.png/1200px-Logo_UIN_Suska_Riau.png"
                        alt="Logo UIN" class="h-10 w-auto group-hover:scale-110 transition">
                    <div
                        class="h-10 w-10 bg-blue-900 rounded-full flex items-center justify-center text-white font-bold text-xs group-hover:scale-110 transition">
                        SI</div>
                    <div class="flex flex-col text-left">
                        <span class="font-extrabold text-xl leading-none text-blue-900 tracking-tight">HIMASI</span>
                        <span class="text-[10px] text-gray-500 font-bold tracking-widest uppercase">UIN Suska
                            Riau</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php"
                        class="px-4 py-2 text-sm font-bold text-blue-600 bg-blue-50 rounded-full transition">Beranda</a>

                    <div class="relative group">
                        <a href="#"
                            class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">Berita
                            <i class="fas fa-chevron-down text-[10px] pt-1"></i></a>
                        <div
                            class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100 z-50">
                            <a href="#"
                                class="block px-5 py-2.5 text-sm font-bold text-blue-600 hover:bg-blue-50 border-b">Semua
                                Berita</a>
                            <a href="#"
                                class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Berita
                                Umum</a>
                            <a href="#"
                                class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Berita
                                Mahasiswa</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 flex items-center gap-1 transition">Profil
                            <i class="fas fa-chevron-down text-[10px] pt-1"></i></button>
                        <div
                            class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <a href="#profil"
                                class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Tentang
                                HIMASI</a>
                            <a href="#visimisi"
                                class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Visi
                                & Misi</a>
                            <a href="#"
                                class="block px-5 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600">Struktur
                                Organisasi</a>
                        </div>
                    </div>

                    <a href="#agenda"
                        class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 transition">Agenda</a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-800 hover:text-blue-600 focus:outline-none p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="hidden md:hidden bg-white/95 backdrop-blur-md border-t h-screen absolute w-full left-0 top-full overflow-y-auto pb-32 transition-all">
            <div class="p-4 flex flex-col space-y-2">

                <a href="index.php" class="block px-4 py-3 font-bold text-blue-600 bg-blue-50 rounded-lg">Beranda</a>

                <details class="group rounded-lg">
                    <summary
                        class="list-none flex justify-between items-center cursor-pointer px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg transition select-none">
                        <span>Berita</span>
                        <i
                            class="fas fa-chevron-down text-[10px] transition-transform duration-300 group-open:rotate-180"></i>
                    </summary>
                    <div class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/50 rounded-b-lg">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Semua
                            Berita</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Berita
                            Umum</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Berita
                            Mahasiswa</a>
                    </div>
                </details>

                <details class="group rounded-lg">
                    <summary
                        class="list-none flex justify-between items-center cursor-pointer px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg transition select-none">
                        <span>Profil</span>
                        <i
                            class="fas fa-chevron-down text-[10px] transition-transform duration-300 group-open:rotate-180"></i>
                    </summary>
                    <div class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/50 rounded-b-lg">
                        <a href="#profil"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Tentang
                            HIMASI</a>
                        <a href="#visimisi"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Visi
                            & Misi</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Struktur
                            Organisasi</a>
                    </div>
                </details>

                <a href="#agenda"
                    class="block px-4 py-3 font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 rounded-lg transition">Agenda</a>
            </div>
        </div>
    </nav>