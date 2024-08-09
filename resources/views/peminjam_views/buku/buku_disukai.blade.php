@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-heart text-red-primary"></i> Buku yang Disukai</h1>
            <hr class="mb-5">
            @forelse ($liked_books as $item)
                <div
                    class="border p-5 rounded-md shadow-md w-full mb-7 relative overflow-hidden">
                    <div class="flex w-full mb-4">
                        <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                            class="rounded-md w-28 self-start">
                        <div class="text-xs ml-5 self-start w-full">
                            <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->book->judul }}</h1>
                            <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-3 gap-x-3">
                                <p><span class="font-bold text-red-primary">Kode buku: </span>
                                    {{ $item->book->kode_buku }}</p>
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
                                    <a href="">
                                        <button
                                            class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2">Batalkan suka</button>
                                    </a>
                                    <a href="{{ route('detail_buku', $item->id) }}">
                                        <button
                                            class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold">Pinjam buku</button>
                                    </a>
                                </div>
                            </div>
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
