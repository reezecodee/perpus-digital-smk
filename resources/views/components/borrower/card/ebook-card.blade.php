<div class="border p-5 rounded-md shadow-md w-full mb-7">
    <div class="flex w-full mb-4">
        <img src="{{ asset('storage/img/cover/' . ($item->book->cover_buku ?? 'unknown_cover.jpg')) }}"
            class="rounded-md w-28 self-start" loading="lazy">
        <div class="text-xs ml-5 self-start w-full">
            <a href="{{ route('show.bookDetail', $item->book->id) }}">
                <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->book->judul }}</h1>
            </a>
            <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-3 gap-x-3">
                <p><span class="font-bold text-red-primary">Author: </span> {{ $item->book->author }}
                </p>
                <p><span class="font-bold text-red-primary">Penerbit:</span>
                    {{ $item->book->penerbit }}
                </p>
                <p><span class="font-bold text-red-primary">Format:</span>
                    {{ $item->book->format }}
                </p>
                <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->book->isbn }}</p>
                <p><span class="font-bold text-red-primary">Halaman:</span>
                    {{ $item->book->jml_halaman }} halaman</p>
                <p><span class="font-bold text-red-primary">Kategori:</span>
                    {{ $item->book->category->nama_kategori }}</p>

            </div>
            <div class="flex justify-between mt-4">
                <div>
                    <a href="{{ route('show.readEbook', $item->book->id) }}">
                        <button
                            class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2">Baca
                            e-book</button>
                    </a>
                    <button type="button"
                        class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold"
                        data-modal-target="popup-modal2{{ $iteration }}"
                        data-modal-toggle="popup-modal2{{ $iteration }}">Hapus</button>
                </div>
                <div class="flex justify-end text-center">
                    <div class="text-center">
                        <div class="flex justify-center">
                            {!! $barcode($item->book->isbn, 1, 40) !!}
                        </div>
                        <p class="font-medium font-ibm-plex-mono text-center">ISBN {{ $item->book->isbn }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup-modal2{{ $iteration }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full popup-enter-modal">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                data-modal-hide="popup-modal2{{ $iteration }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-red-primary w-12 h-12" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda ingin
                    menghapus e-book ini dari daftar baca Anda</h3>
                <form action="{{ route('delete.eBook', $item->book->id) }}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <button data-modal-hide="popup-modal2{{ $iteration }}" type="submit"
                        class="text-white bg-red-primary hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Ya, hapus
                    </button>
                </form>
                <button data-modal-hide="popup-modal2{{ $iteration }}" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
            </div>
        </div>
    </div>
</div>
