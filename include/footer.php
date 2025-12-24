<footer class="bg-gray-900 text-white pt-20 pb-10">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-gray-800 pb-12">
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold mb-6 flex items-center gap-3">
                    <div
                        class="h-10 w-10 bg-white rounded-full text-blue-900 flex items-center justify-center font-bold text-xs">
                        SI</div>
                    HIMASI UIN SUSKA
                </h3>
                <p class="text-gray-400 leading-relaxed max-w-sm mb-6">
                    Mewujudkan mahasiswa Sistem Informasi yang unggul dalam teknologi, berjiwa pemimpin, dan menjunjung
                    tinggi nilai-nilai keislaman.
                </p>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Tautan Cepat</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="index.php" class="hover:text-blue-400 transition">Beranda</a></li>
                    <li><a href="#visimisi" class="hover:text-blue-400 transition">Visi & Misi</a></li>
                    <li><a href="#agenda" class="hover:text-blue-400 transition">Agenda Acara</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Lokasi & Kontak</h4>
                <ul class="space-y-4 text-gray-400 text-sm mb-6">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-blue-500"></i>
                        <span class="leading-relaxed">Gedung Fakultas Sains & Teknologi, UIN Suska Riau.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center text-gray-600 text-sm">
            © 2025 Himpunan Mahasiswa Sistem Informasi UIN Suska Riau.
        </div>
    </div>
</footer>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</body>

</html>