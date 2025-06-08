<x-borrower-layout :title="$title">
    <form action="" method="POST">
        @csrf
        <section class="mx-auto px-3 lg:px-12 text-gray-600">
            <div class="pt-24 lg:pt-36">
                @if (($data->fine_payment->status_bayar ?? false) == 'Sudah dibayar')
                <div class="p-4 font-medium text-sm text-green-800 rounded-lg bg-green-100 mb-5" role="alert">
                    Pembayaranmu telah sukses, terimakasih sudah bertanggun jawab.
                </div>
                @elseif (($data->fine_payment->status_bayar ?? false) == 'Pembayaran ditolak')
                <div class="p-4 font-medium text-sm text-red-800 rounded-lg bg-red-100 mb-5" role="alert">
                    Pembayaranmu ditolak harap bayar denda sesuai nominal dan kirimkan bukti yang benar.
                </div>
                @elseif (($data->fine_payment->status_bayar ?? false) == 'Menunggu konfirmasi')
                <div class="p-4 font-medium text-sm text-yellow-800 rounded-lg bg-yellow-50 mb-5" role="alert">
                    Pembayaranmu dalam antrian, harap bersabar ini mungkin perlu memakan beberapa waktu.
                </div>
                @endif
                <div class="grid grid-cols-2 gap-5">
                    <div class="border p-7 shadow-md rounded-md mb-5">
                        <div class="flex gap-4">
                            <img src="{{ asset('storage/img/cover/' . ($data->book->cover_buku ?? 'unknown_cover.jpg')) }}"
                                class="w-32 rounded-lg" alt="" srcset="">
                            <div>
                                <div class="mb-2">
                                    <label for="" class="block font-semibold text-xs">Judul</label>
                                    <p class="font-bold">{{ $data->book->judul }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="block font-semibold text-xs">Tangal pinjam</label>
                                    <p class="font-bold">{{ $data->peminjaman }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="block font-semibold text-xs">Pengembalian/Jatuh
                                        tempo</label>
                                    <p class="font-bold">{{ $data->jatuh_tempo }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="block font-semibold text-xs">Kode peminjaman</label>
                                    <p class="font-bold"><span id="loan-code">{{ $data->kode_peminjaman }}</span>
                                        <button onclick="copyLoanCode()"><i class="far fa-copy"></i> <span
                                                class="text-xs" id="copy-loan-info"></span></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border p-7 shadow-md rounded-md mb-5">
                        <div class="mt-0 grow">
                            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal">Status pinjam</dt>
                                        <dd class="text-base font-medium">{{ $data->status }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal">Keterangan denda</dt>
                                        <dd class="text-base font-medium">{{ $data->keterangan_denda }}</dd>
                                    </dl>
                                </div>
                                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                                    <dt class="text-base font-bold">Biaya denda</dt>
                                    @if ($data->keterangan_denda == 'Denda buku rusak')
                                    <dd class="text-base font-bold">
                                        {{ formatRupiah($data->book->fine->denda_rusak ?? 0) }}</dd>
                                    @elseif($data->keterangan_denda == 'Denda buku terlambat')
                                    <dd class="text-base font-bold">
                                        {{ formatRupiah($data->book->fine->denda_terlambat ?? 0) }}</dd>
                                    @elseif($data->keterangan_denda == 'Denda buku tidak kembali')
                                    <dd class="text-base font-bold">
                                        {{ formatRupiah($data->book->fine->denda_tidak_kembali ?? 0) }}</dd>
                                    @else
                                    <dd class="text-base font-bold">-</dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border p-7 shadow-md rounded-md mb-5">
                    <h1 class="text-3xl font-bold">Metode Pembayaran</h1>
                    @foreach ($payments as $group => $items)
                    <h3 class="text-lg font-bold mt-4 mb-2">{{ $group }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($items as $item)
                        <label
                            class="group relative cursor-pointer border rounded-xl p-4 flex items-center gap-4 transition-all hover:shadow-md">
                            <input type="radio" name="payment_method" value="{{ $item['code'] }}" class="peer hidden">

                            <img src="{{ $item['icon_url'] ?? 'https://via.placeholder.com/40' }}"
                                alt="{{ $item['name'] }}" class="w-12 h-12 object-contain">

                            <span class="text-sm font-medium">{{ $item['name'] }}</span>

                            <div
                                class="absolute inset-0 border-2 border-red-primary rounded-xl opacity-0 peer-checked:opacity-100 pointer-events-none transition-all">
                            </div>
                        </label>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="flex justify-end">
                        <x-borrower.button.confirm-btn modaltarget="payment-modal">
                            Lanjutkan Pembayaran
                        </x-borrower.button.confirm-btn>
                    </div>
                </div>
            </div>
        </section>

        <x-borrower.modal.confirm-modal question="Apakah Anda yakin ingin melanjutkan pembayaran?" okbtn="Ya, lanjutkan"
            nobtn="Batalkan" modalname="payment-modal" />
    </form>
</x-borrower-layout>