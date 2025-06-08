<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">

            <div class="space-y-1 border-b pb-4 mb-3">
                <h1 class="text-3xl font-bold">Detail Pembayaran</h1>
                <p class="text-sm text-gray-500">Referensi: <span
                        class="font-medium text-black">T0001000000000000006</span></p>
                <span
                    class="inline-block mt-2 px-3 py-1 text-sm font-semibold bg-green-100 text-green-700 rounded-full">PAID</span>
            </div>

            <!-- Metode Pembayaran -->
            <div class="space-y-1">
                <h2 class="text-xl font-semibold">Metode Pembayaran</h2>
                <div class="flex justify-center items-center gap-4">
                    <img src="https://tripay.co.id/icon/briva.png" alt="BRIVA" class="w-10 h-10 object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold">BRI Virtual Account</p>
                    <p class="font-bold text-2xl">57585748548596587</p>
                </div>
            </div>

            <!-- Rincian Pesanan -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Rincian Denda</h2>
                <div class="divide-y rounded-lg border">
                    <div class="flex gap-5 p-4">
                        <img src="{{ asset('storage/img/cover/' . ($data->book->cover_buku ?? 'unknown_cover.png')) }}"
                            class="w-32 rounded-lg" alt="" srcset="">
                        <div class="grid grid-cols-4 gap-5">
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Judul</label>
                                <p class="font-bold">Buku Test SNBT</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Tangal Pinjam</label>
                                <p class="font-bold">20 Mei 2025</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Pengembalian/Jatuh
                                    Tempo</label>
                                <p class="font-bold">25 Mei 2025</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Kode Peminjaman</label>
                                <p class="font-bold">0912930123
                                </p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Diambil Dirak</label>
                                <p class="font-bold">Gatot Kaca</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Nominal Denda</label>
                                <p class="font-bold">Rp. 300000</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Status</label>
                                <p class="font-bold">Terkena Denda</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Jenis Denda</label>
                                <p class="font-bold">Buku Hilang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total & Biaya -->
            <div class="space-y-2 py-4 text-base mb-5 border-b">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span>Rp1.000.000</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Biaya Merchant</span>
                    <span>Rp1.500</span>
                </div>
                <div class="flex justify-between text-lg font-bold">
                    <span>Total Bayar</span>
                    <span>Rp1.000.000</span>
                </div>
            </div>

            <!-- Petunjuk Pembayaran -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Petunjuk Pembayaran</h2>

                <div class="space-y-6">
                    <!-- Instruction 1 -->
                    <div>
                        <h3 class="font-semibold mb-2">Internet Banking</h3>
                        <ol class="list-decimal space-y-1 ml-5 text-sm text-gray-700 leading-relaxed">
                            <li>Login ke internet banking Bank BRI Anda</li>
                            <li>Pilih menu <strong>Pembayaran</strong> lalu klik menu <strong>BRIVA</strong></li>
                            <li>Masukkan Kode Bayar <strong>57585748548596587</strong></li>
                            <li>Periksa detail transaksi, lalu konfirmasi</li>
                            <li>Masukkan mPIN dan selesaikan transaksi</li>
                        </ol>
                    </div>

                    <!-- Instruction 2 -->
                    <div>
                        <h3 class="font-semibold mb-2">Aplikasi BRImo</h3>
                        <ol class="list-decimal space-y-1 ml-5 text-sm text-gray-700 leading-relaxed">
                            <li>Login ke aplikasi BRImo</li>
                            <li>Pilih menu <strong>BRIVA</strong></li>
                            <li>Masukkan Nomor Pembayaran <strong>57585748548596587</strong></li>
                            <li>Periksa detail lalu konfirmasi dan selesaikan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-borrower-layout>