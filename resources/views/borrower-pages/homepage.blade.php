<x-borrower-layout :title="$title">
    <section>
        <div
            class="absolute inset-0 -z-10 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
        </div>
        <div class="pt-7 lg:pt-20 mx-auto">
            <div class="flex justify-center mb-1">
                <div class="w-full py-2 px-3 lg:px-24">
                    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            @forelse($carousels as $item)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('storage/img/carousel/' . ($item->carousel_file ?? 'unknown_carousel.jpg')) }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-lg h-36 lg:h-72 shadow-lg"
                                        alt="...">
                                </div>
                            @empty
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="/img/unknown_carousel.png"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-lg h-36 lg:h-72"
                                        alt="...">
                                </div>
                            @endforelse
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="px-3 lg:px-24 mx-auto">
                <div class="flex flex-col lg:flex-row justify-between items-center">
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg mb-5">
                        <span class="text-xl lg:text-3xl font-semibold"><i class="fas fa-book text-red-primary"></i> Lihat
                            semua
                            buku</span>
                        <p class="mb-3 mt-3 font-normal text-gray-500">Lihat semua buku yang tersedia di
                            perpustakaan</p>
                        <a href="{{ route('all_books') }}?format=fisik"
                            class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            Lihat rak perpustakaan
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="text-center hidden lg:block">
                        <i class="fas fa-book-open text-5xl text-red-primary"></i>
                        <p class="text-2xl font-bold">Welcome</p>
                    </div>
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg mb-5">
                        <span class="text-xl lg:text-3xl font-semibold"><i class="fas fa-book-reader text-red-primary"></i>
                            Baca via
                            E-book</span>
                        <p class="mb-3 mt-3 font-normal text-gray-500">Kamu bisa baca secara online
                            dengan E-book</p>
                        <a href="{{ route('all_books') }}?format=elektronik"
                            class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            Lihat rak E-book
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-2xl mb-4 font-bold">Rekomendasi untuk mu</h1>
                    <div class="flex lg:block justify-center lg:justify-normal">
                        <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                            @foreach ($recomendations as $item)
                                <x-peminjam.card.book :item="$item" />
                            @endforeach
                        </div>
                        @if ($recomendations->isEmpty())
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                        class="w-52 inline-block">
                                    <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan buku
                                        rekomendasi</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-7">
                    <h1 class="text-2xl mb-4 font-bold">E-book terbaru</h1>
                    <div class="flex lg:block justify-center lg:justify-normal">
                        <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                            @foreach ($latest_ebooks as $item)
                                <x-peminjam.card.book :item="$item" />
                            @endforeach
                        </div>
                        @if ($latest_ebooks->isEmpty())
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                        class="w-52 inline-block">
                                    <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan E-book
                                        terbaru</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-7">
                    <h1 class="text-2xl mb-4 font-bold">Artikel terbaru</h1>
                    <div class="flex lg:block justify-center lg:justify-normal">
                        <div class="overflow-x-auto scrollbar-hide">
                            <div class="flex gap-9 lg:gap-3">
                                @foreach ($articles as $item)
                                    <x-peminjam.card.article :item="$item" />
                                @endforeach
                            </div>
                        </div>
                        @if ($recomendations->isEmpty())
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                        class="w-52 inline-block">
                                    <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan artikel
                                        terbaru</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
