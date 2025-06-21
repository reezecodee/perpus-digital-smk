<x-student-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="mb-4 flex flex-col items-center md:mb-8 lg:flex-row lg:justify-between">
                    <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-0 lg:text-3xl">Semua Kategori
                    </h2>

                    <p class="max-w-md text-center lg:text-right">Daftar kategori ini merupakan
                        kategori buku yang tersedia di E-Perpustakaan.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 rounded-lg md:grid-cols-3 lg:gap-6">
                    @foreach ($categories as $item)
                        <a href="{{ route('show.searchResult') }}?q={{ $item->nama_kategori }}">
                            <div
                                class="flex h-16 items-center justify-center rounded-lg bg-gray-100 p-4 text-gray-400 text-xl hover:bg-red-100 hover:text-red-400 font-semibold sm:h-32 hvr-shrink">
                                {{ $item->nama_kategori }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-student-layout>
