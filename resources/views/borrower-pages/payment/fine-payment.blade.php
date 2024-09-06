<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
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
                    <div class="flex justify-end mb-3">
                        <a href="">
                            <x-borrower.button.normal-btn>
                                Lihat cara pembayaran
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
                        <img src="https://assets.kompasiana.com/items/album/2020/06/05/qris-baznas-5eda34a3d541df43ac060963.png?t=o&v=300"
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
                        <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-base font-normal text-gray-500">Bank</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-base font-normal text-gray-500">Nomor
                                            Rekening</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-base font-normal text-gray-500">Atas Nama
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Bank BRI</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">283487238423</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Perpustakaan SMK</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Bank BCA</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">283487238423</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Perpustakaan SMK</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Bank Mandiri</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">283487238423</td>
                                        <td class="px-6 py-4 text-base font-medium text-gray-900">Perpustakaan SMK</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Bayar Via Qris
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4 flex justify-center">
                                <img src="https://assets.kompasiana.com/items/album/2020/06/05/qris-baznas-5eda34a3d541df43ac060963.png?t=o&v=300"
                                    class="w-72 border-2 rounded-md" alt="" srcset="">
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-red-primary rounded-lg border border-gray-200 hover:bg-red-500 text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border p-7 shadow-md rounded-md mb-5">
                <h3 class="text-xl font-semibold mb-4">Upload bukti pembayaran</h3>
                <form action="{{ route('fine-payment', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center mb-5">
                        <img src="{{ asset('storage/img/pembayaran/' . ($data->fine_payment->bukti_pembayaran ?? '')) }}"
                            width="400" id="imagePreview" alt="" srcset="">
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 mb-5"
                        id="imageInput" name="bukti_pembayaran" accept=".jpg, .jpeg, .png" type="file" onchange="previewImage(event)">
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
        </div>
    </section>

    <script src="/js/payment.js"></script>
</x-borrower-layout>
