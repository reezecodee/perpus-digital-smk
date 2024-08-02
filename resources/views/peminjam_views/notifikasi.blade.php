@extends('layouts.peminjam_layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-xl font-bold mb-1">Notifikasi</h1>
                    <hr class="mb-3">
                    @forelse ($notifications as $item)
                        <div class="border rounded-lg p-2 mb-3">
                            <div>
                                <a href="{{ route('peminjam.read_notif') }}/{{ $item->id }}">
                                    <h1 class="text-lg font-bold leading-5 lg:leading-none">{{ $item->judul }}</h1>
                                </a>
                                <p class="text-xs lg:text-sm">{{ $item->pesan }}</p>
                                <p class="text-xs font-bold">Pengirim: {{ $item->sender->nama }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center">
                            <img src="https://img.freepik.com/free-vector/reminders-concept-illustration_114360-4278.jpg?t=st=1718678017~exp=1718681617~hmac=03486e2c7f75d0a8659aa431896b5c439d94d0784da90ee0cd92183f3a4b9b10&w=740"
                                alt="" srcset="" width="300" class="block">
                        </div>
                        <h1 class="text-black text-center text-lg font-semibold">Belum ada notifikasi yang masuk</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
