@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-12 text-gray-600">
        <div class="pt-36">
            <form method="post">
                <div class="flex flex-wrap justify-between">
                    <div class="self-start max-w-2xl w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Data peminjam <i class="fas fa-user text-red-primary"></i>
                            </h2>
                            <hr class="mb-4">
                            <div class="flex justify-between items-center">
                                <p class="font-semibold text-base">Penerima : Ambatukam |
                                    081298897305</p>
                            </div>
                            <p class="text-sm mb-2 font-medium"><i class="fas fa-map-marker-alt text-red-primary"></i>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur sed unde repudiandae
                                fugit suscipit velit!
                            </p>
                            <textarea id="message" name="catatan_kurir" rows="3"
                                class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                placeholder="Catatan peminjaman (opsional)"></textarea>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Buku yang dipinjam <i
                                    class="fas fa-book text-red-primary"></i></h2>
                            <hr class="mb-4">
                            <div class="flex gap-7 mb-3">
                                <img src="https://ebooks.gramedia.com/ebook-covers/94048/image_highres/BLK_EST1721993497003.jpg"
                                    alt="" width="100" class="rounded-md self-start">
                                <div class="self-start">
                                    <h3 class="font-bold text-lg mb-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Aliquid, culpa.</h3>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-xs font-medium">Jumlah pinjam: 1</p>
                                            <p class="text-xs font-medium">Stok tersisa: 1</p>
                                            <p class="text-xs font-medium">Tgl kembali: 20 Juni 2023</p>
                                        </div>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                            class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mt-6"
                                            type="button">Biaya denda <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Dropdown menu -->
                                    <div id="dropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                                    out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="self-start max-w-md w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1"><i class="fas fa-wallet text-red-primary"></i> Biaya denda
                            </h2>
                            <p class="mb-2 text-sm font-semibold text-red-primary">Total denda yang harus kamu bayarkan jika
                                buku
                                rusak, hilang, dan terlambat.
                            </p>
                            <hr class="mb-4">
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/3982/3982575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-40">Denda buku rusak <br><span class="text-base">Rp.
                                            20.000</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/12376/12376575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-40">Denda buku hilang <br><span class="text-base">Rp.
                                            20.000</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/1407/1407089.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-40">Denda buku terlambat <br><span
                                            class="text-base">Rp.
                                            20.000</span></p>
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
                                    <span class="font-medium">Penting!</span> Jika kamu sengaja tidak melakukan pembayaran
                                    denda, pihak perpustakaan akan melakukan tindakan hukum sesuai dengan aturan yang
                                    berlaku. Meminjam artinya setuju dengan peraturan perpustakaan.
                                </div>
                            </div>
                            <hr class="border-2 bg-gray-400 mb-3">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                <label for="default-checkbox"
                                    class="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300 text-justify">Saya Atyla Azfa Al Harits, bersedia ditindak jalur hukum apabila saya dengan sengaja tidak membayar denda jika saya menghilangkan, merusak, dan terlambat mengembalikan buku.</label>
                            </div>
                            <button type="submit"
                                class="bg-red-primary hover:bg-red-500 p-2.5 text-white w-full font-bold rounded-lg">Konfirmasi peminjaman</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
