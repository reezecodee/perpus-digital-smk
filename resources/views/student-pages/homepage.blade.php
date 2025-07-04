<x-student-layout :title="$title">
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
                <div
                    class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-full p-6">
                    <div class="flex items-center mb-4">
                        <h5 class="ml-3 text-slate-800 text-xl font-semibold">
                            E-Perpustakaan Menu
                        </h5>
                    </div>
                    <div class="flex flex-wrap justify-around gap-3">
                        <x-borrower.button.menu-btn background="bg-red-100" menuTitle="Lihat semua buku"
                            :url="route('show.allBooks') . '?format=fisik'">
                            <img src="https://www.svgrepo.com/show/298470/book.svg" class="w-10" alt="">
                        </x-borrower.button.menu-btn>
                        <x-borrower.button.menu-btn background="bg-amber-100" menuTitle="Lihat semua ebook"
                            :url="route('show.allBooks') . '?format=elektronik'">
                            <img src="https://www.svgrepo.com/show/263069/ebook.svg" class="w-10" alt="">
                        </x-borrower.button.menu-btn>
                        <x-borrower.button.menu-btn background="bg-green-100" menuTitle="Lihat semua kategori"
                            :url="route('show.allCategories')">
                            <img src="https://www.svgrepo.com/show/477129/label.svg" class="w-10" alt="">
                        </x-borrower.button.menu-btn>
                        <x-borrower.button.menu-btn background="bg-blue-100" menuTitle="Lihat rak buku"
                            :url="route('show.allShelves')">
                            <img src="https://www.svgrepo.com/show/382165/book-shelf-books-education-learning-school-study.svg"
                                class="w-10" alt="">
                        </x-borrower.button.menu-btn>
                        {{-- <x-borrower.button.menu-btn background="bg-orange-100" menuTitle="Informasi denda"
                            :url="route('show.allBooks')">
                            <img src="https://www.svgrepo.com/show/287711/ticket.svg" class="w-10" alt="">
                        </x-borrower.button.menu-btn>
                        <x-borrower.button.menu-btn background="bg-green-100" menuTitle="FAQ" :url="route('show.allBooks')">
                            <img src="https://www.svgrepo.com/show/475413/information.svg" class="w-10"
                                alt="">
                        </x-borrower.button.menu-btn> --}}
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-2xl mb-4 font-bold">Rekomendasi untuk mu</h1>
                    <div class="flex lg:block justify-center lg:justify-normal">
                        <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                            @foreach ($recommendations as $item)
                                <x-borrower.card.book :item="$item" />
                            @endforeach
                        </div>
                        @if ($recommendations->isEmpty())
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
                            @foreach ($latestEbooks as $item)
                                <x-borrower.card.book :item="$item" />
                            @endforeach
                        </div>
                        @if ($latestEbooks->isEmpty())
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <img src="/img/assets/oh_no.webp" alt="" srcset=""
                                        class="w-52 inline-block">
                                    <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan
                                        E-book
                                        terbaru</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-student-layout>
