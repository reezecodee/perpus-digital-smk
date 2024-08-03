@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-heart text-red-primary"></i> Buku yang Disukai</h1>
            <hr class="mb-5">
            @forelse ($liked_books as $item)
                <div class="flex items-center max-w-full w-full mb-4">
                    <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                        class="rounded-md self-start" width="130" alt="">
                    <div class="text-xs ml-5 mr-0 lg:mr-16 self-start">
                        <h1 class="text-lg lg:text-xl max-w-xl font-bold">{{ $item->book->judul }}</h1>
                        <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-2 gap-x-5">
                            <p><span class="font-bold text-red-primary">Author: </span> {{ $item->book->author }}</p>
                            <p><span class="font-bold text-red-primary">Penerbit:</span> {{ $item->book->penerbit }}</p>
                            <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->book->isbn }}</p>
                            <p><span class="font-bold text-red-primary">Halaman:</span> {{ $item->book->jml_halaman }} halaman</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="">
                                <button
                                    class="p-2 mr-1 lg:mr-2 rounded-md bg-red-primary hover:bg-red-500 text-white font-semibold text-xs lg:text-base text-end self-center">
                                    Batalkan suka
                                </button>
                            </a>
                            <a href="">
                                <button
                                    class="p-2 mr-1 lg:mr-2 rounded-md border border-red-primary text-red-primary hover:bg-red-primary hover:text-white font-semibold text-xs lg:text-base text-end self-center">
                                    Pinjam buku
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex justify-center">
                    <img src="https://img.freepik.com/free-vector/shopping-cart-with-boxes-concept-illustration_114360-22402.jpg?t=st=1718539036~exp=1718542636~hmac=6311c7f4ed1802f76b28ae505cd0312c9eb9a2c279bd4d555b14c305b9864005&w=740"
                        alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang Anda sukai
                </h1>
            @endforelse
        </div>
    </section>
@endsection
