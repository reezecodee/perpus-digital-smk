@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-12 text-gray-600">
        <div class="pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-book-bookmark"></i> Rak buku saya</h1>
            <hr class="mb-3">
            <div class="flex gap-6 mb-5">
                <p id="queue"
                    class="text-red-primary hover:text-red-primary font-bold p-1 border-b-2 border-red-primary cursor-pointer">
                    Pinjaman</p>
                <p id="send" class="font-bold p-1 hover:text-red-primary cursor-pointer">E-book</p>
                <p id="finish" class="font-bold p-1 hover:text-red-primary cursor-pointer">Beri ulasan</p>
                <p id="comment" class="font-bold p-1 hover:text-red-primary cursor-pointer">Sudah diulas</p>
            </div>
            <div id="slide-display1" class="block">
                <?php if (true) : ?>
                <a href="" class="inline-block">
                    <div class="flex max-w-full w-full mb-4">
                        <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                            class="rounded-md" width="130" alt="">
                        <div class="text-xs ml-5 mr-16 self-start">
                            <h1 class="text-lg font-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Laboriosam, velit.</h1>
                            <p>Ukuran : 10</p>
                            <p>Jumlah : 10</p>
                        </div>
                    </div>
                </a>
                <?php else : ?>
                <div class="flex justify-center">
                    <img src="https://img.freepik.com/free-vector/ecommerce-web-page-concept-illustration_114360-8204.jpg?t=st=1718598345~exp=1718601945~hmac=c43c1f2d9c8c3f1dd252459a0d9d12ccc479a0a4d0c007e33521db51a41f363e&w=826"
                        alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada produk yang masuk ke antrian</h1>
                <?php endif; ?>
            </div>
            <div id="slide-display2" class="hidden">
                <?php if (true) : ?>
                <a href="" class="inline-block">
                    <div class="flex max-w-full w-full mb-4">
                        <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                            class="rounded-md" width="130" alt="">
                        <div class="text-xs ml-5 mr-16 self-start">
                            <h1 class="text-lg font-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex,
                                magni.</h1>
                            <p>Ukuran : 10</p>
                            <p>Jumlah : 10</p>
                        </div>
                    </div>
                </a>
                <?php else : ?>
                <div class="flex justify-center">
                    <img src="https://img.freepik.com/free-vector/ecommerce-web-page-concept-illustration_114360-8204.jpg?t=st=1718598345~exp=1718601945~hmac=c43c1f2d9c8c3f1dd252459a0d9d12ccc479a0a4d0c007e33521db51a41f363e&w=826"
                        alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada produk yang dikirim penjual</h1>
                <?php endif; ?>
            </div>
            <div id="slide-display3" class="hidden">
                <?php if (true) : ?>
                <div class="w-full border p-5 rounded-md shadow-md mb-7">
                    <div class="flex items-center mb-4">
                        <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                            class="rounded-md self-start" width="130" alt="">
                        <div class="text-xs ml-5 mr-16 self-start">
                            <a href="" class="inline-block">
                                <h1 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Aliquam, mollitia? </h1>
                            </a>
                            <div class="flex gap-4">
                                <p>Ukuran : 10</p>
                                <p>Jumlah : 10</p>
                            </div>
                            <p class="text-base font-semibold">Berikan ulasanmu</p>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rating" value="5" required />
                                    <label for="star5" title="5">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" required />
                                    <label for="star4" title="4">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" required />
                                    <label for="star3" title="3">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" required />
                                    <label for="star2" title="2">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" required />
                                    <label for="star1" title="1">1 star</label>
                                </div>
                                <textarea id="message" name="komentar" rows="3"
                                    class="block p-2.5 max-w-xl w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                    placeholder="Tulis komentar disini..." required></textarea>
                                <button type="submit"
                                    class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-3 font-bold mt-2">Berikan
                                    ulasan</button>
                            </form>
                        </div>
                    </div>

                </div>
                <?php else : ?>
                <div class="flex justify-center">
                    <img src="https://img.freepik.com/free-vector/ecommerce-web-page-concept-illustration_114360-8204.jpg?t=st=1718598345~exp=1718601945~hmac=c43c1f2d9c8c3f1dd252459a0d9d12ccc479a0a4d0c007e33521db51a41f363e&w=826"
                        alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada produk yang selesai diproses</h1>
                <?php endif; ?>
            </div>
            <div id="slide-display4" class="hidden">
                <?php if (true) : ?>
                <div class="w-full border p-5 rounded-md shadow-md mb-7">
                    <div class="flex items-center mb-4">
                        <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                            class="rounded-md" width="130" alt="">
                        <div class="text-xs ml-5 mr-16 self-center">
                            <a href="" class="inline-block">
                                <h1 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    Iste, perspiciatis. </h1>
                            </a>
                            <div class="flex gap-4">
                                <p>Ukuran : 10</p>
                                <p>Jumlah : 10</p>
                            </div>
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
                                        class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border focus:ring-red-500 focus:border-red-500 outline-none"
                                        disabled>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit dolor sunt autem pariatur ut molestias odit deleniti fugit impedit atque?</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div class="flex justify-center">
                    <img src="https://img.freepik.com/free-vector/status-update-concept-illustration_114360-1567.jpg?w=826&t=st=1718601041~exp=1718601641~hmac=6f6bb3f9c3ee3f3bd06712581820c04a984cbf09f413d2d646fbc93cddcac274"
                        alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada produk yang kamu berikan ulasan</h1>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script src="/js/transaksi.js"></script>
@endsection
