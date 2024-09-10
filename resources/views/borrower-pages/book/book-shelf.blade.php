<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-book-bookmark text-red-primary"></i> Rak buku
                saya
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
                    <x-borrower.card.book-loan-card :item="$item" />
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/oh_no.webp" alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang dipinjam</h1>
                @endforelse
            </div>
            <div id="slide-display2" class="hidden">
                @forelse ($eBooks as $item)
                    <x-borrower.card.ebook-card :item="$item" :iteration="$loop->iteration" :barcode="$barcode" />
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/oh_no.webp" alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada e-book yang dibaca</h1>
                @endforelse
            </div>
            <div id="slide-display3" class="hidden">
                @forelse ($forReviews as $item)
                    <x-borrower.card.review-book-card :item="$item" :iteration="$loop->iteration" />
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
                    <x-borrower.card.reviewed-book-card :item="$item" />
                @empty
                    <div class="flex justify-center">
                        <img src="/img/assets/no_review.webp" alt="" srcset="" width="300"
                            class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang kamu berikan ulasan
                    </h1>
                @endforelse
            </div>
        </div>
    </section>

    <script src="/js/shelf.js"></script>
</x-borrower-layout>
