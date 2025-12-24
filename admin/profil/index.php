<?php
// Pastikan path include header benar
include '../../include/header.php';
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600 transition">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Profil Himpunan</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Kelola Profil HIMA
                </h1>
                <p class="text-gray-500 mt-2">Atur konten statis seperti Sejarah, Visi Misi, dan Struktur Organisasi.
                </p>
            </div>

            <a href="tambah.php"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Bagian Profil
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Urutan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Judul Bagian</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Preview Konten</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Terakhir Update</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-center font-bold text-gray-400">#1</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">Visi & Misi</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                Menjadikan HIMASI sebagai wadah aspirasi mahasis...
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="w-16 h-10 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                    <i class="fas fa-image"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                20 Des 2024 10:00
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"
                                        title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-center font-bold text-gray-400">#2</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">Sejarah Singkat</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                Berdiri sejak tahun 2002, Jurusan Sistem Informa...
                            </td>
                            <td class="px-6 py-4">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                    class="w-16 h-10 object-cover rounded-lg border border-gray-200" alt="Img">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                22 Des 2024 08:30
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"
                                        title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-center font-bold text-gray-400">#3</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">Sambutan Bupati</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                Assalamu’alaikum Warahmatullahi Wabarakatuh...
                            </td>
                            <td class="px-6 py-4">
                                <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                    class="w-16 h-10 object-cover rounded-lg border border-gray-200" alt="Img">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                24 Des 2024 14:15
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"
                                        title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../../include/footer.php'; ?>