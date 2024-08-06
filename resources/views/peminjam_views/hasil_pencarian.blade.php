@extends('layouts.peminjam_layout')
@section('content')
    <section class="container mx-auto px-3 lg:px-0 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="text-2xl font-bold mb-10">Hasil pencarian: {{ request()->query('q') }}</h1>
            <div class="flex lg:block justify-center lg:justify-normal">
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-9 lg:gap-3">
                    @foreach ($books as $item)
                        <div class="w-36">
                            <a href="">
                                <img src="https://ebooks.gramedia.com/ebook-covers/90158/thumb_image_normal/BLK_RDMSTHOMS1706838863836.jpg"
                                    alt="" srcset="" class="rounded-lg mb-2">
                                <p class="text-sm font-semibold">{{ $item->judul }}</p>
                                <p class="text-xs font-medium">Kategori: {{ $item->category->nama_kategori }}
                                </p>
                                <p class="text-xs font-medium"><i class="fas fa-star text-yellow-300"></i> 5.0 | Tersedia 5
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($books->isEmpty())
                <div class="text-center w-full">
                    <div class="flex justify-center">
                        <img src="https://img.freepik.com/free-vector/alone-concept-illustration_114360-2393.jpg?t=st=1719286782~exp=1719290382~hmac=042a32bef22cd657a15a387dde3026df755b0f782287c13c50ead0fe2c6d2ebf&w=900"
                            alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Tidak dapat menemukan pencarian
                        "{{ request()->query('q') }}"</h1>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
