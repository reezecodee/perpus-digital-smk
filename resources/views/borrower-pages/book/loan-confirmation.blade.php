<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <form method="post">
                @csrf
                <div class="flex flex-wrap justify-between">
                    <div class="self-start max-w-2xl w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Data peminjam <i
                                    class="fas fa-user text-red-primary"></i>
                            </h2>
                            <hr class="mb-4">
                            <div class="flex justify-between items-center">
                                <p class="font-semibold text-base">Peminjam : {{ auth()->user()->nama }} |
                                    {{ auth()->user()->telepon }}</p>
                            </div>
                            <p class="text-sm mb-2 font-medium"><i class="fas fa-map-marker-alt text-red-primary"></i>
                                {{ auth()->user()->alamat }}
                            </p>
                            <textarea id="message" name="catatan_kurir" rows="3"
                                class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                placeholder="Catatan peminjaman (opsional)"></textarea>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Buku yang dipinjam <i
                                    class="fas fa-book text-red-primary"></i></h2>
                            <hr class="mb-4">
                            <div class="flex gap-7 mb-0 lg:mb-3">
                                <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.jpg')) }}"
                                    alt="" width="100" class="rounded-md self-start">
                                <div class="self-start w-full">
                                    <h3 class="font-bold text-lg mb-2">{{ $data->judul }}</h3>
                                    <p class="font-semibold text-sm mb-1">Durasi pinjam</p>
                                    <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-primary focus:border-red-500 block w-full p-2.5">
                                </div>
                            </div>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Lokasi rak buku <i
                                    class="fas fa-table text-red-primary"></i></h2>
                            <hr class="mb-4">
                            <div class="p-4 mb-4 mt-4 text-sm text-blue-800 rounded-lg bg-blue-50 font-medium"
                                role="alert">
                                Pastikan Anda mengambil buku di lokasi yang sudah ditentukan
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://www.svgrepo.com/show/19065/shelves.svg" alt="" srcset=""
                                    class="w-20">
                                <div class="text-sm">
                                    <p class="font-semibold"><span class="text-red-primary">Nama rak:</span> Ambaturak
                                    </p>
                                    <p class="font-semibold"><span class="text-red-primary">Kode rak:</span> 19327831
                                    </p>
                                    <p class="font-semibold"><span class="text-red-primary">Salinan serupa:</span> 20
                                        buku
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="self-start max-w-full lg:max-w-md w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1"><i class="fas fa-wallet text-red-primary"></i> Biaya
                                denda
                            </h2>
                            <p class="mb-2 text-sm font-semibold text-red-primary">Total denda yang harus kamu bayarkan
                                jika
                                buku
                                rusak, tidak kembali, dan terlambat.
                            </p>
                            <hr class="mb-4">
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/3982/3982575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku rusak <br><span
                                            class="text-base">
                                            {{ formatRupiah($data->fine->denda_rusak) }}</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/12376/12376575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku tidak kembali <br><span
                                            class="text-base">
                                            {{ formatRupiah($data->fine->denda_tidak_kembali) }}</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/1407/1407089.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku terlambat <br><span
                                            class="text-base">{{ formatRupiah($data->fine->denda_terlambat) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1">Konfirmasi peminjaman</h2>
                            <hr class="mb-4">
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Penting!</span> Jika kamu sengaja tidak melakukan
                                    pembayaran
                                    denda, pihak perpustakaan akan melakukan tindakan hukum sesuai dengan aturan yang
                                    berlaku. Meminjam artinya setuju dengan peraturan perpustakaan.
                                </div>
                            </div>
                            <hr class="border-2 bg-gray-400 mb-3">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    required>
                                <label for="default-checkbox"
                                    class="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300 text-justify">Saya
                                    <b>{{ auth()->user()->nama }}</b>, bersedia ditindak jalur hukum apabila saya
                                    dengan
                                    sengaja tidak
                                    membayar denda jika saya menghilangkan, merusak, dan terlambat mengembalikan
                                    buku.</label>
                            </div>
                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="bg-red-primary hover:bg-red-500 p-2.5 text-white w-full font-bold rounded-lg">Konfirmasi
                                peminjaman</button>
                        </div>
                    </div>
                </div>

                <div id="popup-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-red-primary w-12 h-12" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda akan
                                    meminjam buku ini? pastikan semuanya sudah benar</h3>
                                <button data-modal-hide="popup-modal" type="submit"
                                    class="text-white bg-red-primary hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, sudah benar
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Belum,
                                    batalkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-borrower-layout>
