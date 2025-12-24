<?php include 'include/header.php'; ?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <a href="index.php" class="hover:text-blue-600 transition">Beranda</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <a href="#" class="hover:text-blue-600 transition">Berita</a>
                <i class="fas fa-chevron-right text-[10px]"></i>
                <span class="text-blue-600 font-semibold truncate">Judul Berita Disini...</span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                Mahasiswa Sistem Informasi UIN Suska Riau Raih Juara 1 Kompetisi Coding Nasional
            </h1>

            <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600 font-medium">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-user"></i>
                    </div>
                    <span>Admin HIMASI</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-calendar"></i>
                    </div>
                    <span>24 Des 2024</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <i class="far fa-folder-open"></i>
                    </div>
                    <span class="text-blue-600">Prestasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                <div class="rounded-3xl overflow-hidden shadow-2xl mb-10 border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1531545514256-b1400bc00f31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        alt="Featured Image"
                        class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                </div>

                <article class="text-gray-700 text-lg leading-relaxed space-y-6">
                    <p>
                        <span class="font-bold text-5xl float-left mr-3 text-blue-600 font-serif leading-none">P</span>
                        ekanbaru - Tim mahasiswa dari jurusan Sistem Informasi UIN Suska Riau kembali menorehkan
                        prestasi gemilang di kancah nasional. Dalam ajang Hackathon 2024 yang diselenggarakan di
                        Jakarta, tim "Code Warrior" berhasil menyisihkan ratusan peserta dari berbagai universitas
                        ternama di Indonesia.
                    </p>
                    <p>
                        Kompetisi yang berlangsung selama 3 hari ini menuntut peserta untuk menciptakan solusi digital
                        inovatif bagi permasalahan lingkungan. Tim HIMASI mengusung aplikasi berbasis AI untuk
                        mendeteksi titik api kebakaran hutan secara real-time.
                    </p>

                    <h3 class="text-2xl font-bold text-gray-900 pt-4">Inovasi untuk Negeri</h3>
                    <p>
                        Ketua Jurusan Sistem Informasi, Bapak Fulan M.Kom, menyampaikan apresiasi setinggi-tingginya.
                        "Ini adalah bukti bahwa mahasiswa kita mampu bersaing dan memberikan kontribusi nyata melalui
                        teknologi," ujarnya saat penyambutan tim di bandara.
                    </p>

                    <ul class="list-disc list-inside space-y-2 bg-blue-50 p-6 rounded-xl border border-blue-100 my-6">
                        <li class="font-bold text-blue-800 mb-2">Anggota Tim Pemenang:</li>
                        <li>Ahmad (Angkatan 2022) - Frontend Dev</li>
                        <li>Siti (Angkatan 2022) - Backend Dev</li>
                        <li>Budi (Angkatan 2023) - UI/UX Designer</li>
                    </ul>

                    <p>
                        Diharapkan prestasi ini dapat memicu semangat mahasiswa lain untuk terus berkarya dan tidak
                        takut berkompetisi.
                    </p>
                </article>

                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-gray-900 text-sm">Tags:</span>
                            <div class="flex gap-2">
                                <a href="#"
                                    class="px-3 py-1 bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 rounded-full text-xs font-bold transition">#Prestasi</a>
                                <a href="#"
                                    class="px-3 py-1 bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 rounded-full text-xs font-bold transition">#Nasional</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-gray-900 text-sm">Bagikan:</span>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 transition"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#"
                                class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-10">
                    <a href="#"
                        class="p-4 rounded-xl border border-gray-200 hover:border-blue-500 hover:shadow-md transition group text-left">
                        <span class="block text-xs text-gray-400 mb-1">Sebelumnya</span>
                        <h4 class="font-bold text-gray-800 group-hover:text-blue-600 line-clamp-1">Kegiatan Bakti Sosial
                            HIMASI</h4>
                    </a>
                    <a href="#"
                        class="p-4 rounded-xl border border-gray-200 hover:border-blue-500 hover:shadow-md transition group text-right">
                        <span class="block text-xs text-gray-400 mb-1">Selanjutnya</span>
                        <h4 class="font-bold text-gray-800 group-hover:text-blue-600 line-clamp-1">Seminar Teknologi AI
                            2025</h4>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg">Cari Berita</h3>
                        <form action="" class="relative">
                            <input type="text" placeholder="Ketik kata kunci..."
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
                            <button class="absolute right-3 top-3 text-gray-400 hover:text-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 text-lg flex items-center gap-2">
                            <span class="w-1 h-6 bg-blue-600 rounded-full"></span> Kategori
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#"
                                    class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Berita Umum</span>
                                    <span
                                        class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">12</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Prestasi</span>
                                    <span
                                        class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex justify-between items-center text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition group">
                                    <span>Akademik</span>
                                    <span
                                        class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-1 rounded-md group-hover:bg-blue-200 group-hover:text-blue-700">8</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-6 text-lg flex items-center gap-2">
                            <span class="w-1 h-6 bg-yellow-400 rounded-full"></span> Terbaru
                        </h3>
                        <div class="space-y-6">
                            <a href="#" class="flex gap-4 group">
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80"
                                        alt="News"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">10 Jan
                                        2025</span>
                                    <h4
                                        class="font-bold text-gray-800 text-sm leading-snug group-hover:text-blue-600 transition line-clamp-2 mt-1">
                                        Pelantikan Pengurus Baru HIMASI 2025
                                    </h4>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80"
                                        alt="News"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">05 Jan
                                        2025</span>
                                    <h4
                                        class="font-bold text-gray-800 text-sm leading-snug group-hover:text-blue-600 transition line-clamp-2 mt-1">
                                        Workshop UI/UX Design Bersama Expert
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>