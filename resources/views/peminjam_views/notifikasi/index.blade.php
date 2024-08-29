@extends('layouts.peminjam-layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-xl font-bold mb-1">Notifikasi</h1>
                    <hr class="mb-3">
                    @forelse ($notifications as $item)
                        <div class="border rounded-lg p-3 mb-3 group bg-gray-100 hover:bg-transparent">
                            <div class="flex gap-4">
                                <img src="https://www.svgrepo.com/show/489040/mail.svg" class="w-20" alt=""
                                    srcset="">
                                    {{-- https://www.svgrepo.com/show/489041/mail-open.svg --}}
                                <a href="{{ route('read_notif', $item->id) }}" class="w-full">
                                    <p
                                        class="font-bold leading-5 mb-1 group-hover:text-red-primary truncate-text-notif">
                                        {{ $item->judul }}</p>
                                    <p class="text-xs lg:text-sm truncate-text">{{ strip_tags($item->pesan) }}</p>
                                    <p class="text-xs font-bold mb-0">Pengirim: {{ $item->sender->nama }}</p>
                                    <p class="text-end text-xs font-medium">{{ $item->created_at->diffForHumans() }}</p>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center">
                            <img src="/img/assets/notification.webp" alt="" srcset="" width="300"
                                class="block">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Belum ada notifikasi yang masuk</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
