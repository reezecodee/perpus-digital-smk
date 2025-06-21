<x-student-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
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
                                <p class="font-bold">{{ $data->kode_peminjaman }}
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
                @if($createNewPayment)
                <form action="{{ route('store.createFinePayment', $data->id) }}" method="POST">
                    @csrf
                    <h1 class="text-3xl font-bold">Metode Pembayaran</h1>
                    @foreach ($payments as $group => $items)
                    <h3 class="text-lg font-bold mt-4 mb-2">{{ $group }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($items as $item)
                        <label
                            class="group relative cursor-pointer border rounded-xl p-4 flex items-center gap-4 transition-all hover:shadow-md">
                            <input type="radio" name="method" value="{{ $item['code'] }}" class="peer hidden">

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

                    <x-borrower.modal.confirm-modal question="Apakah Anda yakin ingin melanjutkan pembayaran?"
                        okbtn="Ya, lanjutkan" nobtn="Batalkan" modalname="payment-modal" />
                </form>
                @endif

                @if(!$createNewPayment)
                <h1 class="text-3xl font-bold">Pembayaran Sebelumnya</h1>
                <div class="flex mt-4 mb-2 justify-center">
                    <img src="/img/assets/history.webp" width="300" alt="" srcset="">
                </div>
                <div class="flex gap-5 mt-2 mb-2 justify-center">
                    @if($finePayment->status_bayar == 'UNPAID')
                    <form action="{{ route('update.canclePayment', $finePayment->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-borrower.button.normal-btn :type="'submit'">
                            Batalkan Pembayaran
                        </x-borrower.button.normal-btn>
                    </form>
                    @endif
                    <a href="{{ route('show.detailPayment', $finePayment->id) }}">
                        <x-borrower.button.normal-btn>
                            Lihat Pembayaran Sebelumnya
                        </x-borrower.button.normal-btn>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
</x-student-layout>