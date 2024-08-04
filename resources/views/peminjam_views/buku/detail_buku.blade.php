@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-24 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex gap-12 mb-7">
                <div class="self-start p-4 shadow-lg rounded-xl">
                    <img src="https://ebooks.gramedia.com/ebook-covers/94048/image_highres/BLK_EST1721993497003.jpg"
                        class="rounded-2xl shadow-md w-72" alt="" srcset="">
                </div>
                <div class="self-start w-full">
                    <div class="w-full self-start">
                        <h1 class="text-3xl font-bold mb-1">{{ $data->judul }}</h1>
                        <p class="text-sm font-semibold"><i class="fas fa-star text-yellow-300"></i> {{ $rating }}
                            Rating | Tersedia
                            10</p>
                        <div class="mt-5">
                            <div class="grid grid-cols-2">
                                <p class="text-base font-semibold"><span class="text-red-primary">Author:</span>
                                    {{ $data->author }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Penerbit:</span>
                                    {{ $data->penerbit }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Tanggal terbit:</span>
                                    {{ $data->tgl_terbit }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">ISBN:</span>
                                    {{ $data->isbn }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Kategori:</span>
                                    {{ $data->category->nama_kategori }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Bahasa:</span>
                                    {{ $data->bahasa }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Kode buku:</span>
                                    {{ $data->format }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Status:</span>
                                    {{ $data->status }}</p>
                            </div>
                        </div>
                        <p class="font-bold mt-3">{{ $likes }} Orang menyukai buku ini</p>
                        <div class="mt-2 flex gap-3">
                            <a href="/konfirmasi-peminjaman/{{ $data->id }}">
                                <button class="bg-red-primary hover:bg-red-500 rounded-md text-white p-2.5 font-bold">Pinjam
                                    buku</button>
                            </a>
                            <a href="">
                                <button
                                    class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md p-2.5 font-bold"><i
                                        class="fas fa-heart"></i> Tambah ke daftar suka</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-7 hidden lg:block lg:mb-7">
                <div class="font-medium">
                    <ul>
                        <li class="font-bold text-lg">Sinopsis: </li>
                        <li class="text-justify">{{ $data->sinopsis }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="font-medium block lg:hidden mb-4 lg:mb-0">
                <ul>
                    <li>- Kategori: Komik</li>
                    <li class="mb-3">- Penerbit: Gramedia</li>
                    <li class="font-bold text-lg">Deskripsi: </li>
                    <li class="text-justify">Ubah lagi
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <h1 class="font-extrabold text-2xl mb-4">Ulasan buku ({{ count($reviews) }})</h1>
            <div class="flex gap-7">
                <div class="w-full self-start">
                    @forelse ($reviews as $item)
                        <div class="border border-gray-400 rounded-xl p-5 shadow-sm mb-5">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="/img/unknown_profile.jpg" class="rounded-full" width="40" alt=""
                                    srcset="">
                                <div class="flex justify-between items-center w-full">
                                    <div class="block">
                                        <p class="font-bold text-sm">{{ $item->borrower_review->nama }}</p>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 2) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 3) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 4) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 ms-1 @if ($item->rating == 5) text-yellow-300 @else text-gray-300 @endif"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="text-xs font-semibold block">{{ $item->created_at }}</span>
                                </div>
                            </div>
                            <div class="font-medium flex items-start gap-5 mt-1">
                                <p>{{ $item->komentar }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center">
                            <img src="https://img.freepik.com/free-vector/hidden-person-concept-illustration_114360-8814.jpg?t=st=1718434515~exp=1718438115~hmac=62a428c6b62ee81638d60bff20d55f64fb9d8f27f0691d84cc1310b25fbbbd68&w=826"
                                alt="" srcset="" width="300">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Belum ada komentar terkait buku ini</h1>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="mt-7">
            <h1 class="font-extrabold text-2xl mb-4">Rekomendasi serupa</h1>
            <div class="overflow-x-auto whitespace-nowrap">
                <div class="inline-flex gap-10">
                    <div class="w-40 pr-7 inline-block">
                        <a href="">
                            <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-bold">Jujutsu Kaisen: Shibuya Incident</p>
                            <p class="text-xs font-medium">Kategori: Komik</p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5 | Tersedia 10</p>
                        </a>
                    </div>
                    <div class="w-40 pr-7 inline-block">
                        <a href="">
                            <img src="https://ebooks.gramedia.com/ebook-covers/40678/general_small_covers/ID_KPG2017MTH10LBER_S.jpg"
                                alt="" srcset="" class="rounded-lg mb-2">
                            <p class="text-sm font-bold">Jujutsu Kaisen: Shibuya Incident</p>
                            <p class="text-xs font-medium">Kategori: Komik</p>
                            <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5 | Tersedia 10</p>
                        </a>
                    </div>
                    <!-- Tambahkan lebih banyak item di sini jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

    <script src="/js/checkoutOrCart.js"></script>
@endsection
