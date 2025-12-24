<?php
// Pastikan path include header benar sesuai struktur foldermu
include '../../include/header.php';
?>

<div class="pt-24 pb-10 bg-blue-50/50 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                    <a href="../index.php" class="hover:text-blue-600 transition">Dashboard</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-blue-600 font-semibold">Manajemen Berita</span>
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Kelola Artikel & Berita
                </h1>
                <p class="text-gray-500 mt-2">Pantau, edit, dan publikasikan kegiatan HIMASI.</p>
            </div>

            <a href="tambah.php"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Berita Baru
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
                    <i class="far fa-newspaper"></i>
                </div>
                <div>
                    <h4 class="text-gray-500 text-sm font-medium">Total Artikel</h4>
                    <span class="text-2xl font-extrabold text-gray-900">24</span>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                <div
                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xl">
                    <i class="far fa-check-circle"></i>
                </div>
                <div>
                    <h4 class="text-gray-500 text-sm font-medium">Terbit (Published)</h4>
                    <span class="text-2xl font-extrabold text-gray-900">18</span>
                </div>
            </div>
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
                <div
                    class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 text-xl">
                    <i class="far fa-edit"></i>
                </div>
                <div>
                    <h4 class="text-gray-500 text-sm font-medium">Draft</h4>
                    <span class="text-2xl font-extrabold text-gray-900">6</span>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <input type="text" placeholder="Cari judul berita..."
                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
            </div>

            <div class="flex gap-2">
                <select
                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Semua Kategori</option>
                    <option value="umum">Umum</option>
                    <option value="prestasi">Prestasi</option>
                </select>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Info Berita</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80"
                                        alt="Thumbnail" class="w-12 h-12 rounded-lg object-cover shadow-sm">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1">Pelantikan Pengurus
                                            Baru HIMASI 2025</div>
                                        <div class="text-xs text-gray-500 mt-0.5"><i class="far fa-user mr-1"></i> Admin
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Umum
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                20 Jan 2025
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="#"
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </a>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition"
                                        title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">2</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1">Workshop UI/UX Design
                                            (Draft)</div>
                                        <div class="text-xs text-gray-500 mt-0.5"><i class="far fa-user mr-1"></i> Fulan
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    Akademik
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                    Draft
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="#"
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </a>
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

            <div
                class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <span class="text-sm text-gray-500">Menampilkan 1 sampai 5 dari 24 data</span>
                <div class="flex gap-1">
                    <button
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition text-sm disabled:opacity-50"><i
                            class="fas fa-chevron-left"></i></button>
                    <button
                        class="px-3 py-1 rounded-md bg-blue-600 border border-blue-600 text-white text-sm">1</button>
                    <button
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition text-sm">2</button>
                    <button
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition text-sm">3</button>
                    <button
                        class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition text-sm"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
// Pastikan path include footer benar
include '../../include/footer.php';
?>