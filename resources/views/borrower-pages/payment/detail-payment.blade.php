<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">

            <div class="space-y-1 border-b pb-4 mb-3">
                <h1 class="text-3xl font-bold">Detail Pembayaran</h1>
                <p class="text-sm text-gray-500">Referensi: <span class="font-medium text-black">{{
                        $detailPayment['merchant_ref'] }}</span></p>
                <span
                    class="inline-block mt-2 px-3 py-1 text-sm font-semibold {{ $detailPayment['status'] == 'PAID' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full">{{
                    $detailPayment['status'] }}</span>
            </div>

            <!-- Metode Pembayaran -->
            <div class="space-y-1">
                <h2 class="text-xl font-semibold">Metode Pembayaran</h2>
                <div class="flex justify-center items-center">
                    <img src="{{ $logo }}" class="w-20 h-20 object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold">{{ $detailPayment['payment_name'] }}</p>
                    <p class="font-bold text-2xl">{{ $detailPayment['pay_code'] }}</p>
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
                    <span>Rp.{{ $detailPayment['amount_received'] }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Biaya Layanan</span>
                    <span>Rp.{{ $detailPayment['total_fee'] }}</span>
                </div>
                <div class="flex justify-between text-lg font-bold">
                    <span>Total Bayar</span>
                    <span>Rp.{{ $detailPayment['amount'] }}</span>
                </div>
            </div>

            <!-- Petunjuk Pembayaran -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Petunjuk Pembayaran</h2>

                @foreach ($detailPayment['instructions'] as $instruction)
                <div>
                    <h3 class="font-semibold mb-2">{{ $instruction['title'] }}</h3>
                    <ol class="list-decimal space-y-1 ml-5 text-sm text-gray-700 leading-relaxed">
                        @foreach ($instruction['steps'] as $step)
                        <li>{!! $step !!}</li>
                        @endforeach
                    </ol>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</x-borrower-layout>