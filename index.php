<?php include 'include/header.php'; ?>

<div class="relative h-screen min-h-[600px] flex items-center justify-center bg-fixed bg-center bg-cover"
    style="background-image: url('https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
    <div class="absolute inset-0 bg-gray-900/70"></div>
    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="fade-in-up">
            <span class="inline-block py-1 px-4 rounded-full border border-white/30 bg-white/10 backdrop-blur-md text-blue-100 text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-6">
                Official Website
            </span>
        </div>
        <h1 class="fade-in-up delay-100 text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl">
            Himpunan Mahasiswa <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Sistem Informasi</span>
        </h1>
        <p class="fade-in-up delay-200 text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Wadah aspirasi, inovasi, dan kreativitas mahasiswa UIN Suska Riau. Bersinergi mewujudkan teknologi masa depan.
        </p>
        <div class="fade-in-up delay-300 flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="#profil" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg transition transform hover:-translate-y-1 hover:scale-105 flex items-center gap-2">
                Kenal Lebih Dekat <i class="fas fa-arrow-right"></i>
            </a>
            <a href="#berita" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-bold rounded-full transition transform hover:-translate-y-1">
                Baca Berita Terkini
            </a>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white/50 bounce-slow">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </div>
</div>

<div class="relative -mt-16 z-20 px-4">
    <div class="container mx-auto max-w-5xl bg-white rounded-2xl shadow-2xl p-8 md:p-10 flex flex-wrap justify-between items-center text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
        <div class="w-full md:w-1/3 p-4">
            <div class="text-4xl font-extrabold text-blue-600 mb-1">150+</div>
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Mahasiswa Aktif</div>
        </div>
        <div class="w-full md:w-1/3 p-4">
            <div class="text-4xl font-extrabold text-yellow-500 mb-1">8</div>
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Divisi & Biro</div>
        </div>
        <div class="w-full md:w-1/3 p-4">
            <div class="text-4xl font-extrabold text-cyan-500 mb-1">24</div>
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Agenda Terlaksana</div>
        </div>
    </div>
</div>

<div id="profil" class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 relative">
                <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                <div class="absolute bottom-0 -right-4 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Tentang HIMASI" class="relative z-10 rounded-2xl shadow-2xl rotate-3 hover:rotate-0 transition duration-500 w-full max-w-md mx-auto border-4 border-white">
            </div>
            <div class="w-full md:w-1/2">
                <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Tentang HIMASI</h4>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Mengabdi dengan Hati, <br>Bergerak dengan <span class="text-blue-600 underline decoration-yellow-400 decoration-4 underline-offset-4">Teknologi</span>.
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Himpunan Mahasiswa Sistem Informasi (HIMASI) UIN Suska Riau berdiri sejak tahun 2002. Kami hadir sebagai rumah bagi mahasiswa untuk mengembangkan soft skill, kepemimpinan, dan kemampuan teknis di bidang IT.
                </p>
                <a href="#" class="inline-block bg-gray-900 text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-800 transition shadow-lg">
                    Lihat Struktur Pengurus Lengkap →
                </a>
            </div>
        </div>
    </div>
</div>

<div id="sambutan" class="py-24 bg-blue-50/50 relative overflow-hidden border-t border-gray-100">
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
            <div class="w-full md:w-3/5 order-2 md:order-1">
                <div class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest text-blue-800 uppercase bg-blue-100 rounded-full">
                    <i class="fas fa-quote-left mr-2"></i>Leadership Message
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Sambutan Bupati HIMASI <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Periode 2025/2026</span>
                </h2>
                <blockquote class="text-xl text-gray-700 font-medium italic border-l-4 border-blue-500 pl-6 mb-6 leading-relaxed">
                    "Mahasiswa Sistem Informasi bukan hanya tentang kode dan algoritma, tapi tentang menciptakan solusi yang bermanfaat bagi peradaban."
                </blockquote>
                <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi HIMASI UIN Suska Riau. Website ini hadir sebagai wujud transparansi, informasi, dan wadah aspirasi bagi seluruh mahasiswa Sistem Informasi.
                </p>
            </div>
            <div class="w-full md:w-2/5 order-1 md:order-2">
                <div class="relative group">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Bupati HIMASI" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-6 pt-12">
                            <h3 class="text-white text-xl font-bold">Muhammad Fulan</h3>
                            <p class="text-blue-300 text-sm font-medium uppercase tracking-wider">Bupati Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="visimisi" class="py-24 bg-white relative overflow-hidden border-t border-gray-100">
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 font-bold tracking-[0.2em] text-sm uppercase mb-2 block">Our Goals</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Visi & Misi</h2>
        </div>
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-12 border border-gray-100">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/2 relative min-h-[300px]">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Foto Bersama" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-blue-900/20"></div>
                </div>
                <div class="w-full md:w-1/2 p-10 md:p-14 flex flex-col justify-center bg-gradient-to-br from-white to-blue-50">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Utama</h3>
                    <p class="text-xl text-gray-600 italic leading-relaxed font-medium">
                        "Menjadikan Himpunan Mahasiswa Sistem Informasi sebagai wadah yang unggul dalam pengembangan teknologi, berjiwa pemimpin, serta menjunjung tinggi nilai-nilai keislaman."
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition border border-gray-100 group">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition"><i class="fas fa-graduation-cap text-xl"></i></div>
                <h4 class="font-bold text-lg text-gray-900 mb-2">Akademik & Riset</h4>
                <p class="text-sm text-gray-500">Mengembangkan potensi akademik mahasiswa melalui riset teknologi.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition border border-gray-100 group">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-yellow-500 group-hover:text-white transition"><i class="fas fa-users text-xl"></i></div>
                <h4 class="font-bold text-lg text-gray-900 mb-2">Kepemimpinan</h4>
                <p class="text-sm text-gray-500">Membentuk karakter pemimpin yang tangguh dan disiplin.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition border border-gray-100 group">
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-cyan-600 mb-4 group-hover:bg-cyan-500 group-hover:text-white transition"><i class="fas fa-hands-helping text-xl"></i></div>
                <h4 class="font-bold text-lg text-gray-900 mb-2">Pengabdian</h4>
                <p class="text-sm text-gray-500">Mengimplementasikan ilmu TI untuk memecahkan masalah masyarakat.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition border border-gray-100 group">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-500 group-hover:text-white transition"><i class="fas fa-star-and-crescent text-xl"></i></div>
                <h4 class="font-bold text-lg text-gray-900 mb-2">Nilai Keislaman</h4>
                <p class="text-sm text-gray-500">Menanamkan nilai-nilai keislaman dalam setiap aktivitas.</p>
            </div>
        </div>
    </div>
</div>

<div id="agenda" class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Agenda & Berita</h2>
        <p class="text-gray-500 mb-10">Kegiatan terbaru dari kami.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-lg">PBAK Jurusan SI 2025</h3>
                <p class="text-gray-500 text-sm mt-2">24 Desember 2024</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-lg">Workshop Web Dev</h3>
                <p class="text-gray-500 text-sm mt-2">10 Januari 2025</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-lg">Malam Keakraban</h3>
                <p class="text-gray-500 text-sm mt-2">15 Februari 2025</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>