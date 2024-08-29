@extends('layouts.peminjam-layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-heart text-red-primary"></i> Buku yang Disukai</h1>
            <hr class="mb-5">
            @forelse ($liked_books as $item)
                <x-peminjam.card.liked-book-card :item="$item" :iteration="$loop->iteration" />
            @empty
                <div class="flex justify-center">
                    <img src="/img/assets/oh_no.webp" alt="" srcset="" width="300" class="block">
                </div>
                <h1 class="text-black text-center text-lg font-semibold">Belum ada buku yang Anda sukai
                </h1>
            @endforelse
        </div>
    </section>
@endsection
