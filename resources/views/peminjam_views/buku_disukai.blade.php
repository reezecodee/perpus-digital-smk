@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-12 text-gray-600">
        <div class="pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-heart"></i> Buku yang Disukai</h1>
            <hr class="mb-5">
            <?php if (true) : ?>
            <div class="flex items-center max-w-full w-full mb-4">
                <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                    class="rounded-md" width="130" alt="">
                <div class="text-xs ml-5 mr-16 self-center">
                    <h1 class="text-lg font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, ipsum!</h1>
                </div>
                <a href="">
                    <button
                        class="p-2 mr-2 rounded-md bg-red-primary hover:bg-red-500 text-white font-semibold text-base text-end self-center">
                        Batalkan suka
                    </button>
                </a>
            </div>
            <?php else : ?>
            <div class="flex justify-center">
                <img src="https://img.freepik.com/free-vector/shopping-cart-with-boxes-concept-illustration_114360-22402.jpg?t=st=1718539036~exp=1718542636~hmac=6311c7f4ed1802f76b28ae505cd0312c9eb9a2c279bd4d555b14c305b9864005&w=740"
                    alt="" srcset="" width="300" class="block">
            </div>
            <h1 class="text-black text-center text-lg font-semibold">Belum ada produk yang ditambahkan di dalam keranjang
            </h1>
            <?php endif; ?>
        </div>
    </section>
@endsection
