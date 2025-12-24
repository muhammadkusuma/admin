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
                    <span class="text-blue-600 font-semibold">Data Anggota</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                    Manajemen Anggota
                </h1>
                <p class="text-gray-500 mt-2">Kelola data pengurus, anggota aktif, dan alumni HIMASI.</p>
            </div>
            
            <a href="tambah.php" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition transform hover:-translate-y-1 flex items-center gap-2">
                <i class="fas fa-user-plus"></i> Tambah Anggota
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="container mx-auto px-6">
        
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <input type="text" placeholder="Cari nama atau NIM..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <select class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Semua Divisi</option>
                    <option value="Kominfo">Kominfo</option>
                    <option value="Kaderisasi">Kaderisasi</option>
                </select>
                <select class="w-full md:w-auto px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                    <option value="">Semua Angkatan</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama & NIM</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jabatan / Divisi</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Angkatan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kontak</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        
                        <tr class="hover:bg-blue-50/30 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Bivandira+Aurel&background=random" class="w-10 h-10 rounded-full border border-gray-200">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Bivandira Aurel Mahadewa</div>
                                        <div class="text-xs text-blue-600 font-mono">12422022421</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block text-sm font-semibold text-gray-800">Bupati Mahasiswa</span>
                                <span class="block text-xs text-gray-500">Pengurus Inti</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold">2022</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <a href="https://wa.me/628123456789" class="text-green-600 hover:underline flex items-center gap-1">
                                    <i class="fab fa-whatsapp"></i> 0812-3456-xxxx
                                </a>
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
                                    <img src="https://ui-avatars.com/api/?name=Suria+Briska&background=random" class="w-10 h-10 rounded-full border border-gray-200">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Suria Briska</div>
                                        <div class="text-xs text-blue-600 font-mono">12450120388</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block text-sm font-semibold text-gray-800">Sekretaris Umum</span>
                                <span class="block text-xs text-gray-500">Kesekretariatan</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold">2022</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <a href="#" class="text-green-600 hover:underline flex items-center gap-1">
                                    <i class="fab fa-whatsapp"></i> 0822-9876-xxxx
                                </a>
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
                            <td class="px-6 py-4 text-sm text-gray-500 font-medium">3</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Mahasiswa+Baru&background=random" class="w-10 h-10 rounded-full border border-gray-200">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">Mahasiswa Percobaan</div>
                                        <div class="text-xs text-blue-600 font-mono">1195011000</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block text-sm font-semibold text-gray-800">Anggota Muda</span>
                                <span class="block text-xs text-gray-500">Kominfo</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold">2024</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <span class="text-gray-400">-</span>
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
                <span class="text-sm text-gray-500">Menampilkan 3 data</span>
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