@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="border rounded-md p-3 w-full mb-9 bg-gray-100">
                <h2 class="text-center text-2xl font-bold mb-4">Pencarian Cepat</h2>
                <div class="flex flex-col lg:flex-row justify-center gap-3">
                    <form class="max-w-md w-full">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500"
                                placeholder="Cari buku di perpustakaan" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center lg:justify-normal justify-center"
                        type="button">Filter berdasarkan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
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
            <h1 class="text-2xl font-bold mb-10">Buku Perpustakaan (1000)</h1>
            <div class="flex lg:block justify-center lg:justify-normal">
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                    <div class="w-36">
                        <a href="">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-semibold">Jujutsu Kaisen: Shibuya</p>
                            <p class="text-xs font-medium">Kategori: Komik
                            </p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5.0 | Tersedia 5
                            </p>
                        </a>
                    </div>
                    <div class="w-36">
                        <a href="">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-semibold">Jujutsu Kaisen: Shibuya</p>
                            <p class="text-xs font-medium">Kategori: Komik
                            </p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5.0 | Tersedia 5
                            </p>
                        </a>
                    </div>
                    <div class="w-36">
                        <a href="">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-semibold">Jujutsu Kaisen: Shibuya</p>
                            <p class="text-xs font-medium">Kategori: Komik
                            </p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5.0 | Tersedia 5
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
