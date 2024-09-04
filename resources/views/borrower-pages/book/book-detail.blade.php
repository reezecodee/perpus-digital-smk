@php
    $user = Auth::user();
    $pendingLoan = $user->loan()->where('status', 'Menunggu persetujuan')->exists();
    $loanWithFine = $user->loan()->where('status', 'Terkena denda')->exists();
@endphp

<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-24 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex gap-5 mb-7 shadow-lg p-4 rounded-lg">
                <div class="self-start p-4">
                    <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.jpg')) }}"
                        class="rounded-2xl shadow-md w-72" alt="" srcset="">
                </div>
                <div class="self-start p-4 w-full">
                    <div class="w-full self-start">
                        <h1 class="text-3xl font-bold mb-1">{{ $data->judul }}</h1>
                        <p class="text-sm font-semibold"><i class="fas fa-star text-yellow-300"></i>
                            {{ $rating($data->id) }}
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
                                <p class="text-base font-semibold"><span class="text-red-primary">Format:</span>
                                    {{ $data->format }}</p>
                                <p class="text-base font-semibold"><span class="text-red-primary">Status:</span>
                                    {{ $data->status }}</p>
                            </div>
                        </div>
                        <p class="font-bold mt-3">{{ $likes }} Orang menyukai
                            {{ $data->format == 'Fisik' ? 'Buku' : 'E-book' }} ini</p>
                        <div class="mt-2 flex gap-3">
                            @if ($data->format == 'Fisik')
                                @if ($pendingLoan || $loanWithFine)
                                    <div>
                                        <button
                                            class="bg-gray-400 cursor-not-allowed rounded-md text-white p-2.5 font-bold"
                                            disabled>
                                            Tidak dapat meminjam buku
                                        </button>
                                    </div>
                                @else
                                    <a href="{{ route('confirm', $data->id) }}">
                                        <button
                                            class="bg-red-primary hover:bg-red-500 rounded-md text-white p-2.5 font-bold">
                                            Pinjam buku ini
                                        </button>
                                    </a>
                                @endif
                            @elseif($data->format == 'Elektronik')
                                <form action="{{ route('update_e_book', $data->id) }}" method="post">
                                    @csrf
                                    <button type="submit" value="tambah" name="e_book"
                                        class="bg-red-primary hover:bg-red-500 rounded-md text-white p-2.5 font-bold"><i
                                            class="fab fa-readme"></i> Baca
                                        E-book</button>
                                </form>
                            @endif
                            @if ($is_liked)
                                <form action="{{ route('update_like', $data->id) }}" method="post">
                                    @csrf
                                    <button value="batal" name="like" type="submit"
                                        class="border bg-red-primary text-white hover:bg-red-500 duration-300 rounded-md p-2.5 font-bold"><i
                                            class="fas fa-heart"></i> Batalkan suka</button>
                                </form>
                            @else
                                <form action="{{ route('update_like', $data->id) }}" method="post">
                                    @csrf
                                    <button value="suka" name="like" type="submit"
                                        class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md p-2.5 font-bold"><i
                                            class="fas fa-heart"></i> Tambah ke daftar suka</button>
                                </form>
                            @endif
                        </div>
                        @if ($pendingLoan)
                            <span class="text-sm font-semibold text-red-primary mt-1 block">
                                <i class="fas fa-info-circle"></i> Anda tidak dapat meminjam buku lagi sampai peminjaman
                                sebelumnya disetujui.
                            </span>
                        @elseif($loanWithFine)
                            <span class="text-sm font-semibold text-red-primary mt-1 block">
                                <i class="fas fa-info-circle"></i> Anda tidak dapat meminjam buku lagi sampai denda
                                peminjaman sebelumnya dibayarkan.
                            </span>
                        @else
                            <span class="text-sm font-semibold text-green-500 mt-1 block">
                                <i class="fas fa-info-circle"></i> Anda dapat meminjam buku.
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-7 hidden lg:block lg:mb-7 shadow-lg p-8 rounded-lg">
                <div class="font-medium">
                    <ul>
                        <li class="font-bold text-lg mb-3">Sinopsis/Deskripsi Buku: </li>
                        <li class="text-justify text-sm font-medium">{{ $data->sinopsis }}
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
        <div class="p-8 shadow-lg rounded-lg">
            <h1 class="font-extrabold text-2xl mb-4">Ulasan buku ({{ count($reviews) }})</h1>
            <div class="flex gap-7">
                <div class="w-full self-start">
                    @forelse ($reviews as $index => $item)
                        <div
                            class="border border-gray-400 rounded-xl p-5 shadow-sm mb-5 review-item @if ($index >= 3) hidden @endif">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="{{ asset('storage/img/profile/' . ($item->borrower_review->photo ?? 'unknown.jpg')) }}"
                                    class="rounded-full" width="40" alt="" srcset="" loading="lazy">
                                <div class="flex justify-between items-center w-full">
                                    <div class="block">
                                        <p class="font-bold text-sm">{{ $item->borrower_review->nama }}</p>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 2) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 3) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 @if ($item->rating >= 4) text-yellow-300 @else text-gray-300 @endif ms-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <svg class="w-4 h-4 ms-1 @if ($item->rating == 5) text-yellow-300 @else text-gray-300 @endif"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <span
                                        class="text-xs font-semibold block">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="font-medium flex items-start gap-5 mt-1 text-sm">
                                <p>{{ $item->komentar }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center">
                            <img src="/img/assets/no_comment.webp" alt="" srcset="" width="300">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Belum ada komentar terkait buku ini
                        </h1>
                    @endforelse

                    <!-- Tombol Lihat Semua -->
                    @if (count($reviews) > 3)
                        <button id="showMoreBtn" class="btn btn-primary">Lihat Semua</button>
                        <button id="showLessBtn" class="btn btn-secondary hidden">Lihat Lebih Sedikit</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-7">
            <h1 class="font-extrabold text-2xl mb-4">Rekomendasi serupa</h1>
            <div class="flex lg:block justify-center lg:justify-normal">
                <div class="grid grid-cols-2 lg:grid-cols-5 gap-9 lg:gap-3">
                    @foreach ($recomendations as $item)
                        <x-borrower.card.book :item="$item" />
                    @endforeach
                </div>
            </div>
            @if ($recomendations->isEmpty())
                <div class="flex justify-center">
                    <div class="text-center">
                        <img src="/img/assets/oh_no.webp" alt="" srcset="" class="w-52 inline-block">
                        <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan buku rekomendasi
                            serupa
                        </h1>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showMoreBtn = document.getElementById('showMoreBtn');
            const showLessBtn = document.getElementById('showLessBtn');
            const hiddenReviews = document.querySelectorAll('.review-item.hidden');

            if (showMoreBtn) {
                showMoreBtn.addEventListener('click', function() {
                    hiddenReviews.forEach(function(review) {
                        review.classList.remove('hidden');
                    });
                    showMoreBtn.style.display = 'none';
                    showLessBtn.classList.remove('hidden');
                });
            }

            if (showLessBtn) {
                showLessBtn.addEventListener('click', function() {
                    hiddenReviews.forEach(function(review) {
                        review.classList.add('hidden');
                    });
                    showMoreBtn.style.display = 'block';
                    showLessBtn.classList.add('hidden');
                });
            }
        });
    </script>
</x-borrower-layout>
