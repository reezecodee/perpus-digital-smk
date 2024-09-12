<x-borrower-layout :title="$title">
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
                        <img src="{{ asset('storage/img/cover/' . ($data->placement->book->cover_buku ?? 'unknown_cover.jpg')) }}"
                            class="w-32 rounded-lg" alt="" srcset="">
                        <div>
                            <div class="mb-2">
                                <label for="" class="block font-semibold text-xs">Judul</label>
                                <p class="font-bold">{{ $data->placement->book->judul }}</p>
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
                                <p class="font-bold"><span id="loan-code">{{ $data->kode_peminjaman }}</span> <button
                                        onclick="copyLoanCode()"><i class="far fa-copy"></i> <span class="text-xs"
                                            id="copy-loan-info"></span></button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border p-7 shadow-md rounded-md mb-5">
                    <div class="flex justify-end gap-3 mb-3">
                        @if ($data->fine_payment)
                            <a href="{{ route('show.detailPayment', $data->fine_payment->id) }}">
                                <x-borrower.button.normal-btn>
                                    <i class="fa-solid fa-receipt"></i> Lihat pembayaran
                                </x-borrower.button.normal-btn>
                            </a>
                        @endif
                        <a href="{{ route('show.paymentTutorial') }}" target="_blank">
                            <x-borrower.button.normal-btn>
                                <i class="fa-solid fa-circle-info"></i> Cara pembayaran
                            </x-borrower.button.normal-btn>
                        </a>
                    </div>
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
                                        {{ formatRupiah($data->placement->book->fine->denda_rusak ?? 0) }}</dd>
                                @elseif($data->keterangan_denda == 'Denda buku terlambat')
                                    <dd class="text-base font-bold">
                                        {{ formatRupiah($data->placement->book->fine->denda_terlambat ?? 0) }}</dd>
                                @elseif($data->keterangan_denda == 'Denda buku tidak kembali')
                                    <dd class="text-base font-bold">
                                        {{ formatRupiah($data->placement->book->fine->denda_tidak_kembali ?? 0) }}</dd>
                                @else
                                    <dd class="text-base font-bold">-</dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border p-7 shadow-md rounded-md mb-5">
                <div class="flex justify-between gap-3">
                    <div class="flex gap-5">
                        <img src="{{ asset('storage/img/qris/' . ($qrisPerpus ?? 'qris_not_found.png')) }}"
                            class="w-52 border-2 rounded-md" alt="" srcset="">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold mb-1">Bayar Via Qris</h3>
                            <div class="flex items-center gap-3 mb-3">
                                @if ($data->keterangan_denda == 'Denda buku rusak')
                                    <h3 class="text-2xl font-bold mb-1" id="nominal">
                                        {{ formatRupiah($data->placement->book->fine->denda_rusak ?? 0) }}
                                    </h3>
                                @elseif($data->keterangan_denda == 'Denda buku terlambat')
                                    <h3 class="text-2xl font-bold mb-1" id="nominal">
                                        {{ formatRupiah($data->placement->book->fine->denda_terlambat ?? 0) }}</h3>
                                @elseif($data->keterangan_denda == 'Denda buku tidak kembali')
                                    <h3 class="text-2xl font-bold mb-1" id="nominal">
                                        {{ formatRupiah($data->placement->book->fine->denda_tidak_kembali ?? 0) }}
                                    </h3>
                                @endif
                                <button
                                    class="p-1.5 border-2 border-red-primary text-red-primary rounded-lg text-xs font-semibold hover:bg-red-primary hover:text-white duration-300"
                                    onclick="copyNominal()" id="copy-btn">Salin
                                    nominal</button>
                            </div>
                            <div>
                                <a href="/img/qris/qris.jpeg" download>
                                    <button
                                        class="p-1.5 rounded-lg text-sm font-semibold bg-red-primary text-white hover:bg-red-500 duration-300"><i
                                            class="fas fa-download"></i> Download Qris</button>
                                </a>
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                    class="p-1.5 rounded-lg text-sm font-semibold border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300"><i
                                        class="fas fa-search-plus"></i> Zoom</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-1">Bayar Via Transfer</h3>
                        @if ($accounts->isEmpty())
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="/img/assets/oh_no.webp" class="w-40" alt="" srcset="">
                                </div>
                                <p class="text-base font-semibold text-red-primary">Mohon maaf, pembayaran via
                                    transfer bank tidak tersedia saat ini.</p>
                            </div>
                        @else
                            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-4">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-base font-normal text-gray-500">Bank
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-base font-normal text-gray-500">Nomor
                                                Rekening</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-base font-normal text-gray-500">Atas
                                                Nama
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($accounts as $item)
                                            <tr>
                                                <td class="px-6 py-4 text-base font-medium text-gray-900">
                                                    {{ $item->nama_bank }}</td>
                                                <td class="px-6 py-4 text-base font-medium text-gray-900">
                                                    <span class="no-rekening">{{ $item->no_rekening }}</span>
                                                    <button class="copy-rekening relative">
                                                        <i class="far fa-copy"></i>
                                                        <span class="text-xs absolute top-1 left-4 copy-rekening-info"
                                                            style="display: none">Copied</span>
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 text-base font-medium text-gray-900">
                                                    {{ $item->atas_nama }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <x-borrower.modal.qris-modal :qrisPerpus="$qrisPerpus" />
        </div>
        @if (($data->fine_payment->status_bayar ?? false) != 'Sudah dibayar')
            <div class="border p-7 shadow-md rounded-md mb-5">
                <h3 class="text-xl font-semibold mb-4">Upload bukti pembayaran</h3>
                <form action="{{ route('store.payment', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center mb-5">
                        <img src="{{ asset('storage/img/pembayaran/' . ($data->fine_payment->bukti_pembayaran ?? '')) }}"
                            width="400" id="imagePreview" alt="" srcset="">
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 mb-5"
                        id="imageInput" name="bukti_pembayaran" accept=".jpg, .jpeg, .png" type="file"
                        onchange="previewImage(event)">
                    <div class="text-end">
                        <x-borrower.button.confirm-btn modaltarget="payment-modal">
                            Kirim bukti pembayaran
                        </x-borrower.button.confirm-btn>
                    </div>
                    <x-borrower.modal.confirm-modal
                        question="Pastikan bukti bayar sesuai dengan nominal yang ditentukan, jika tidak pembayaran tidak akan diproses!"
                        okbtn="Kirim bukti" nobtn="Batalkan" modalname="payment-modal" />
                </form>
            </div>
        @else
            <div class="border p-7 shadow-md rounded-md mb-5">
                <h3 class="text-xl font-semibold mb-4">Bukti pembayaran</h3>
                <div class="flex justify-center mb-5">
                    <img src="{{ asset('storage/img/pembayaran/' . ($data->fine_payment->bukti_pembayaran ?? '')) }}"
                        width="400" id="imagePreview" alt="" srcset="">
                </div>
            </div>
        @endif
        </div>
    </section>

    <script src="/js/payment.js"></script>
</x-borrower-layout>
