<footer class="mt-10">
    <div class="bg-red-primary px-3 lg:px-12 py-10 text-white">
        <div class="flex flex-col lg:flex-row justify-between gap-6 lg:gap-0">
            <div>
                <div class="flex items-center gap-2">
                    <img src="/assets/codereeze.png" width="60" alt="" srcset="">
                    <div>
                        <p class="text-sm font-bold">SMK Digital Sistem Informatika</p>
                        <p class="text-xs w-64">Jl. Tanuwijaya, Tawang, Kota Tasikmalaya, Jawa Barat 46385</p>
                    </div>
                </div>
                <p class="text-base lg:text-sm mt-6 max-w-full lg:max-w-xs text-justify">Nikmati membaca seperti di toko
                    buku yang penuh dengan buku keren. Kami selalu memprioritaskan kenyamanan siswa dan pustakawan dalam
                    berinteraksi.</p>
            </div>
            <div>
                <h3 class="font-bold text-xl mb-4">Menu Website</h3>
                <div class="mb-3">
                    <a href="{{ route('notification') }}" class="inline-block font-medium">Notifikasi</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('liked') }}" class="inline-block font-medium">Buku disukai</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('my_shelf') }}" class="inline-block font-medium">Rak buku saya</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('visit') }}" class="inline-block font-medium">Kunjungan</a>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-xl mb-4">Sosial Media</h3>
                <div class="mb-3">
                    <a href="" target="_blank" class="inline-block font-medium">Instagram</a>
                </div>
                <div class="mb-3">
                    <a href="" target="_blank" class="inline-block font-medium">Facebook</a>
                </div>
                <div class="mb-3">
                    <a href="" target="_blank" class="inline-block font-medium">Twitter/X</a>
                </div>
                <div class="mb-3">
                    <a href="" target="_blank" class="inline-block font-medium">LinkedIn</a>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-xl mb-4">Bantuan & Panduan</h3>
                <div class="mb-3">
                    <a href="{{ route('terms_conditions') }}" class="inline-block font-medium">Syarat & Ketentuan</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('privacy_policy') }}" class="inline-block font-medium">Kebijakan Privasi</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('about_us') }}" class="inline-block font-medium">Tentang Kami</a>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-xl mb-4">Informasi</h3>
                <div class="mb-3">
                    <a href="{{ route('contact_us') }}" class="inline-block font-medium">Kontak Kami</a>
                </div>
                <div class="mb-3">
                    <a href="{{ route('article') }}" class="inline-block font-medium">Artikel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center py-2 text-xs font-bold">
        ©️2024 Copyright by SMK Digital Sistem Informatika
    </div>
</footer>
