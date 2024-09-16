<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="mb-4 flex flex-col items-center md:mb-8 lg:flex-row lg:justify-between">
                <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-0 lg:text-3xl">Semua Rak Buku
                </h2>
                <p class="max-w-md text-center lg:text-right">Daftar rak berikut ini merupakan
                    rak buku yang tersedia di E-Perpustakaan.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 justify-center text-lg">
                @foreach ($shelves as $item)
                    <a href="{{ route('show.shelf', $item->id) }}"
                        class="bg-gray-100 flex-grow text-black border-l-8 border-red-primary rounded-md px-3 py-2 w-full md:w-5/12 lg:w-3/12 font-medium">
                        {{ $item->nama_rak }}
                        <div class="text-gray-500 font-thin text-sm pt-1">
                            <span>Topics: 63</span>
                            <span>MCQs: 20697</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-borrower-layout>
