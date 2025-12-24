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
                    <span class="text-blue-600 font-semibold">Agenda Acara</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Manajemen Kegiatan
                </h1>
                <p class="text-gray-500 mt-2">Atur jadwal, lokasi, dan poster kegiatan organisasi.</p>
            </div>
            
            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-calendar-plus"></i> Tambah Agenda
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <input type="text" placeholder="Cari nama kegiatan..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <select class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Semua Kategori</option>
                    <option value="Rapat">Rapat</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Lomba">Lomba</option>
                </select>
                <select class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Status</option>
                    <option value="Akan Datang">Akan Datang</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Waktu & Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        
                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg bg-blue-100 flex flex-col items-center justify-center text-blue-600 shrink-0">
                                        <span class="text-[10px] font-bold uppercase">Jan</span>
                                        <span class="text-lg font-extrabold leading-none">24</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1">Seminar Nasional AI 2025</div>
                                        <div class="text-xs text-gray-500 mt-0.5">Oleh: Divisi Akademik</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="far fa-clock text-blue-400"></i> 08:00 - 12:00 WIB</span>
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="fas fa-map-marker-alt text-red-400"></i> Aula FST UIN Suska</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    Seminar
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-700 border border-green-200">
                                    <i class="fas fa-circle text-[8px] mr-2 self-center animate-pulse"></i> Akan Datang
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition" title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition" title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">2</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex flex-col items-center justify-center text-gray-500 shrink-0">
                                        <span class="text-[10px] font-bold uppercase">Des</span>
                                        <span class="text-lg font-extrabold leading-none">15</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1">Malam Keakraban 2024</div>
                                        <div class="text-xs text-gray-500 mt-0.5">Oleh: Panitia Pelaksana</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="far fa-clock text-gray-400"></i> 19:00 - Selesai</span>
                                    <span class="text-xs text-gray-600 flex items-center gap-2"><i class="fas fa-map-marker-alt text-gray-400"></i> Taman Rekreasi Alam Mayang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Gathering
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600 border border-gray-200">
                                    Selesai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition" title="Edit">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition" title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <span class="text-sm text-gray-500">Menampilkan 2 data</span>
                <div class="flex gap-1">
                    <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 text-sm disabled:opacity-50"><i class="fas fa-chevron-left"></i></button>
                    <button class="px-3 py-1 rounded-md bg-blue-600 border border-blue-600 text-white text-sm">1</button>
                    <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 text-sm"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../include/footer.php'; ?>