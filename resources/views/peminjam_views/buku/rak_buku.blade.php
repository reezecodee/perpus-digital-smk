@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-book-bookmark text-red-primary"></i> Rak buku saya
            </h1>
            <hr class="mb-3">
            <div class="flex gap-6 mb-5">
                <p id="queue"
                    class="text-red-primary hover:text-red-primary font-bold p-1 border-b-2 border-red-primary cursor-pointer text-xs lg:text-base">
                    Pinjaman</p>
                <p id="send" class="font-bold p-1 hover:text-red-primary cursor-pointer text-xs lg:text-base">E-book
                </p>
                <p id="finish" class="font-bold p-1 hover:text-red-primary cursor-pointer text-xs lg:text-base">Beri
                    ulasan</p>
                <p id="comment" class="font-bold p-1 hover:text-red-primary cursor-pointer text-xs lg:text-base">Sudah
                    diulas</p>
            </div>
            <div id="slide-display1" class="block">
                @forelse ($books as $item)
                    <div
                        class="border p-5 rounded-md @if ($item->status == 'Masa pengembalian') bg-yellow-50 @elseif($item->status == 'Terkena denda') bg-red-100 @endif shadow-md w-full mb-7 relative overflow-hidden">
                        <div class="flex justify-end">
                            <div
                                class="bg-red-primary text-white text-xs p-1 absolute right-0 w-40 top-0 text-center font-medium">
                                {{ $item->status }}</div>
                        </div>
                        <div class="flex w-full mb-4">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                class="rounded-md w-28 self-start">
                            <div class="text-xs ml-5 self-start w-full">
                                <a href="{{ route('detail_buku', $item->book->id) }}">
                                    <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->book->judul }}</h1>
                                </a>
                                <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-4 gap-x-3">
                                    <p><span class="font-bold text-red-primary">Author: </span> {{ $item->book->author }}
                                    </p>
                                    <p><span class="font-bold text-red-primary">Penerbit:</span> {{ $item->book->penerbit }}
                                    </p>
                                    <p><span class="font-bold text-red-primary">Tgl pinjam:</span> {{ $item->peminjaman }}
                                    </p>
                                    <p><span class="font-bold text-red-primary">Kode rak:</span> 131231231</p>
                                    <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->book->isbn }}</p>
                                    <p><span class="font-bold text-red-primary">Halaman:</span>
                                        {{ $item->book->jml_halaman }}
                                        halaman</p>
                                    <p><span class="font-bold text-red-primary">Jatuh tempo: </span>
                                        {{ $item->jatuh_tempo }}</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <div>
                                        <a href="{{ route('detail_rent', $item->id) }}">
                                            <button
                                                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2">Lihat
                                                detail</button>
                                        </a>
                                        <button type="button"
                                            class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold"
                                            data-modal-target="popup-modal" data-modal-toggle="popup-modal">Kembalikan
                                            buku</button>
                                    </div>
                                    <div class="flex justify-end text-center">
                                        <div class="text-center">
                                            <div class="flex justify-center">
                                                <p>{!! $barcode(23874823472, 1, 40) !!}</p>
                                            </div>
                                            <p class="font-medium font-ibm-plex-mono text-center">ISBN 238748234722222</p>
                                        </div>
                                    </div>
                                </div>
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
                                        mengembalikan buku ini</h3>
                                    <button data-modal-hide="popup-modal" type="submit"
                                        class="text-white bg-red-primary hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Kembalikan
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/oh_no.webp" alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang dipinjam</h1>
                @endforelse
            </div>
            <div id="slide-display2" class="hidden">
                @forelse ($e_books as $item)
                    <div class="border p-5 rounded-md shadow-md w-full mb-7">
                        <div class="flex w-full mb-4">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                class="rounded-md w-28 self-start">
                            <div class="text-xs ml-5 self-start w-full">
                                <a href="{{ route('detail_buku', $item->book->id) }}">
                                    <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->book->judul }}</h1>
                                </a>
                                <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-3 gap-x-3">
                                    <p><span class="font-bold text-red-primary">Author: </span> {{ $item->book->author }}
                                    </p>
                                    <p><span class="font-bold text-red-primary">Penerbit:</span>
                                        {{ $item->book->penerbit }}
                                    </p>
                                    <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->book->isbn }}</p>
                                    <p><span class="font-bold text-red-primary">Halaman:</span>
                                        {{ $item->book->jml_halaman }} halaman</p>
                                    <p><span class="font-bold text-red-primary">Format:</span>
                                        {{ $item->book->format }}
                                    </p>

                                </div>
                                <div class="flex justify-between mt-4">
                                    <div>
                                        <a href="{{ route('read_e_book', $item->book->id) }}">
                                            <button
                                                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2">Baca
                                                e-book</button>
                                        </a>
                                        <button type="button"
                                            class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold"
                                            data-modal-target="popup-modal2{{ $loop->iteration }}"
                                            data-modal-toggle="popup-modal2{{ $loop->iteration }}">Hapus</button>
                                    </div>
                                    <div class="flex justify-end text-center">
                                        <div class="text-center">
                                            <div class="flex justify-center">
                                                <p>{!! $barcode(23874823472, 1, 40) !!}</p>
                                            </div>
                                            <p class="font-medium font-ibm-plex-mono text-center">ISBN 238748234722222</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="popup-modal2{{ $loop->iteration }}" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                    data-modal-hide="popup-modal2{{ $loop->iteration }}">
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
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda ingin
                                        menghapus e-book ini dari daftar baca Anda</h3>
                                    <form action="{{ route('delete_e_book', $item->book->id) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button data-modal-hide="popup-modal2{{ $loop->iteration }}" type="submit"
                                            class="text-white bg-red-primary hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, hapus
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal2{{ $loop->iteration }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/oh_no.webp" alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada e-book yang dibaca</h1>
                @endforelse
            </div>
            <div id="slide-display3" class="hidden">
                @forelse ($for_reviews as $item)
                    <div class="w-full border p-5 rounded-md shadow-md mb-7">
                        <div>
                            <div class="flex items-center mb-1 lg:mb-4">
                                <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                    class="rounded-md self-start w-28">
                                <div class="text-xs ml-5 mr-0 lg:mr-16 self-start">
                                    <a href="{{ route('detail_buku', $item->book->id) }}" class="inline-block">
                                        <h1 class="text-base lg:text-lg font-bold">{{ $item->judul }}</h1>
                                    </a>
                                    <div>
                                        <p class="text-base font-semibold">Berikan ulasanmu</p>
                                        <form action="" method="post">
                                            @csrf
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5"
                                                    required />
                                                <label for="star5" title="5">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4"
                                                    required />
                                                <label for="star4" title="4">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3"
                                                    required />
                                                <label for="star3" title="3">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2"
                                                    required />
                                                <label for="star2" title="2">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1"
                                                    required />
                                                <label for="star1" title="1">1 star</label>
                                            </div>
                                            <div class="hidden lg:block">
                                                <textarea id="message" name="komentar" rows="3"
                                                    class="block p-2.5 max-w-xl w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                                    placeholder="Tulis komentar disini..." required></textarea>
                                                <button type="submit"
                                                    class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-3 font-bold mt-2">Berikan
                                                    ulasan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="block lg:hidden">
                                <textarea id="message" name="komentar" rows="3"
                                    class="block p-2.5 max-w-xl w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                    placeholder="Tulis komentar disini..." required></textarea>
                                <button type="submit"
                                    class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-3 font-bold mt-2">Berikan
                                    ulasan</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/no_review.webp" alt="" srcset="" width="300"
                            class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang selesai dibaca</h1>
                @endforelse
            </div>
            <div id="slide-display4" class="hidden">
                @forelse ($reviews as $item)
                    <div class="w-full border p-5 rounded-md shadow-md mb-7">
                        <div>
                            <div class="flex items-center mb-4">
                                <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                    class="rounded-md self-start w-28">
                                <div class="text-xs ml-5 mr-0 lg:mr-16 self-center">
                                    <a href="{{ route('detail_buku', $item->book->id) }}" class="inline-block">
                                        <h1 class="text-base lg:text-lg font-bold">{{ $item->book->judul }}</h1>
                                    </a>
                                    <p class="text-lg font-semibold">Ulasan Anda</p>
                                    <div class="flex gap-6 w-full">
                                        <div class="w-full">
                                            <div class="rated">
                                                <input type="radio" id="star5" checked disabled />
                                                <label for="star5" title="5">5 stars</label>
                                                <input type="radio" id="star4" checked disabled />
                                                <label for="star4" title="4">4 stars</label>
                                                <input type="radio" id="star3" checked disabled />
                                                <label for="star3" title="3">3 stars</label>
                                                <input type="radio" id="star2" checked disabled />
                                                <label for="star2" title="2">2 stars</label>
                                                <input type="radio" id="star1" checked"cked" disabled />
                                                <label for="star1" title="1">1 star</label>
                                            </div>
                                            <textarea id="message" rows="3"
                                                class="lg:block p-2.5 w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none hidden"
                                                disabled>{{ $item->komentar }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea id="message" rows="3"
                                class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none lg:hidden"
                                disabled>{{ $item->komentar }}</textarea>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/no_review.webp" alt="" srcset="" width="300"
                            class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang kamu berikan ulasan</h1>
                @endforelse
            </div>
        </div>
    </section>

    <script src="/js/shelf.js"></script>
@endsection
