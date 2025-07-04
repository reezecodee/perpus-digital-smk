<div class="border p-5 rounded-md shadow-md w-full mb-7 relative overflow-hidden">
    <div class="flex w-full mb-4">
        <img src="{{ asset('storage/img/cover/' . ($item->book->cover_buku ?? 'unknown_cover.jpg')) }}"
            class="rounded-md w-28 self-start" loading="lazy">
        <div class="text-xs ml-5 self-start w-full">
            <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->book->judul }}</h1>
            <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-3 gap-x-3">
                <p><span class="font-bold text-red-primary">Format buku: </span>
                    {{ $item->book->format }}</p>
                <p><span class="font-bold text-red-primary">Author: </span> {{ $item->book->author }}
                </p>
                <p><span class="font-bold text-red-primary">Penerbit:</span> {{ $item->book->penerbit }}
                </p>
                <p><span class="font-bold text-red-primary">Kode rak:</span> 131231231</p>
                <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->book->isbn }}</p>
                <p><span class="font-bold text-red-primary">Halaman:</span>
                    {{ $item->book->jml_halaman }}
                    halaman</p>
            </div>
            <div class="flex justify-between mt-4">
                <div>
                    <button type="button"
                        class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2"
                        data-modal-target="popup-modal{{ $iteration }}"
                        data-modal-toggle="popup-modal{{ $iteration }}">Batalkan suka</button>
                    <a href="{{ route('show.bookDetail', $item->book->id) }}">
                        <button
                            class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold">Lihat
                            buku</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-modal{{ $iteration }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full popup-enter-modal">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="popup-modal{{ $iteration }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah kamu yakin ingin menghapus buku ini dari daftar suka?</h3>
                    <form action="{{ route('update.bookLike', $item->book->id) }}" method="post"
                        class="inline">
                        @csrf
                        <button value="batal" name="like" type="submit"
                            data-modal-hide="popup-modal{{ $iteration }}"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, hapus
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal{{ $iteration }}" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
