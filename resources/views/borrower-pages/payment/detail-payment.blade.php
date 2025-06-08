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
                @if(isset($detailPayment['pay_code']))
                <div class="text-center">
                    <p class="font-semibold">{{ $detailPayment['payment_name'] }}</p>
                    <p class="font-bold text-2xl">{{ $detailPayment['pay_code'] }}</p>
                </div>
                @endif
                @if(isset($detailPayment['qr_url']))
                <div class="flex justify-center">
                    <img src="{{ $detailPayment['qr_url'] ?? '' }}" width="200" alt="" srcset="">
                </div>
                @endif
                @if(isset($detailPayment['pay_url']))
                <div class="flex justify-center">
                    <a href="{{ $detailPayment['pay_url'] }}" target="_blank">
                        <x-borrower.button.normal-btn>
                            Bayar Sekarang
                        </x-borrower.button.normal-btn>
                    </a>
                </div>
                @endif
            </div>

            <!-- Rincian Pesanan -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Rincian Denda</h2>
                <div class="divide-y rounded-lg border">
                    <div class="flex gap-5 p-4">
                        <img src="{{ asset('storage/img/cover/' . ($loan->book->cover_buku ?? 'unknown_cover.png')) }}"
                            class="w-32 rounded-lg" alt="" srcset="">
                        <div class="grid grid-cols-4 gap-5">
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Judul</label>
                                <p class="font-bold">{{ $loan->book->judul }}</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Tangal Pinjam</label>
                                <p class="font-bold">{{ $loan->peminjaman }}</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Pengembalian/Jatuh
                                    Tempo</label>
                                <p class="font-bold">{{ $loan->pengembalian }}</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Kode Peminjaman</label>
                                <p class="font-bold">{{ $loan->kode_peminjaman }}
                                </p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Diambil Dirak</label>
                                <p class="font-bold">{{ $loan->placement->shelf->nama_rak }}</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Nominal Denda</label>
                                @if($loan->keterangan_denda === 'Denda buku rusak')
                                <p class="font-bold">Rp. {{ $loan->book->fine->denda_rusak }}</p>
                                @elseif($loan->keterangan_denda === 'Denda buku terlambat')
                                <p class="font-bold">Rp. {{ $loan->book->fine->denda_terlambat }}</p>
                                @else
                                <p class="font-bold">Rp. {{ $loan->book->fine->denda_tidak_kembali }}</p>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Status</label>
                                <p class="font-bold">{{ $loan->status }}</p>
                            </div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Jenis Denda</label>
                                <p class="font-bold">{{ $loan->keterangan_denda }}</p>
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
                <div class="flex justify-end">
                    <form action="{{ route('update.checkStatusPayment', $loan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-borrower.button.normal-btn type="'submit'">Cek Status Pembayaran</x-borrower.button.normal-btn>
                    </form>
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