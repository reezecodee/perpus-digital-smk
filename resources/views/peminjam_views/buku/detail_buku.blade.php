@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-24 text-gray-600">
        <div class="pt-36">
            <div class="flex gap-12 mb-7">
                <div class="self-start">
                    <img src="https://ebooks.gramedia.com/ebook-covers/94048/image_highres/BLK_EST1721993497003.jpg"
                        class="rounded-2xl shadow-md w-60" alt="" srcset="">
                </div>
                <div class="self-start w-full">
                    <div class="w-full self-start">
                        <h1 class="text-xl font-bold mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae,
                            numquam.</h1>
                        <p class="text-sm font-semibold"><i class="fas fa-star text-yellow-300"></i> 5.0 Rating | Stock 10 |
                            10 Ulasan</p>
                        <div class="mt-7">
                            <div class="font-medium">
                                <ul>
                                    <li>- Kategori: Komik</li>
                                    <li class="mb-3">- Penerbit: Gramedia</li>
                                    <li class="font-bold text-lg">Deskripsi: </li>
                                    <li class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Possimus, consequuntur
                                        amet maxime vero quod tempora necessitatibus doloremque, quaerat veniam commodi
                                        aliquam soluta
                                        beatae unde magnam corrupti voluptate aperiam ut, sed temporibus fugiat ex vitae.
                                        Iste rem accusamus
                                        placeat obcaecati ad aliquam commodi, asperiores nihil. Dolore vitae similique
                                        impedit libero iste.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="font-extrabold text-3xl mb-7">Ulasan buku</h1>
            <div class="flex gap-7">
                <div class="w-full self-start">
                    <?php if (true) : ?>
                    <div class="border border-gray-400 rounded-xl p-5 shadow-sm mb-5">
                        <div class="flex items-center gap-3 mb-2">
                            <img src="/img/unknown_profile.jpg" class="rounded-full" width="40" alt=""
                                srcset="">
                            <div>
                                <p class="font-bold text-sm">Ambatukam</p>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                            </div>
                            <span class="text-xs font-semibold">20 Juni 2023</span>
                        </div>
                        <div class="font-medium flex items-start gap-5 mt-4">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, adipisci.</p>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="flex justify-center">
                        <img src="https://img.freepik.com/free-vector/hidden-person-concept-illustration_114360-8814.jpg?t=st=1718434515~exp=1718438115~hmac=62a428c6b62ee81638d60bff20d55f64fb9d8f27f0691d84cc1310b25fbbbd68&w=826"
                            alt="" srcset="" width="300">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada komentar terkait buku ini</h1>
                    <?php endif; ?>
                </div>
                <div class="max-w-md w-full self-start">
                    <div class="border border-gray-400 rounded-xl p-3">
                        <h1 class="font-semibold text-lg mb-2 mt-2">Tulis ulasan anda</h1>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 mb-5"
                            placeholder="Masukkan komentar disini..."></textarea>
                        <button class="bg-red-primary p-2 rounded-md text-white font-semibold text-sm">Kirim
                            ulasan</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="/js/checkoutOrCart.js"></script>
@endsection
