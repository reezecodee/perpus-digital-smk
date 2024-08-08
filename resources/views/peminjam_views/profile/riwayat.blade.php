@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex flex-col lg:flex-row gap-3">
                @include('partials.peminjam.sidebar')
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-xl font-bold mb-1">History peminjaman buku</h1>
                    <hr class="mb-3">
                    <div class="mb-5">
                        <div class="flex gap-5 font-bold">
                            <p id="slide1"
                                class="cursor-pointer text-red-primary border-b-2 border-red-primary pb-1 hover:text-red-primary">
                                Riwayat</p>
                            <p id="slide2" class="cursor-pointer hover:text-red-primary">Denda</p>
                        </div>
                    </div>
                    <div id="slide-display1" class="block">
                        @forelse ($histories as $item)
                            <div class="flex justify-between items-center border p-3 rounded-md mb-3">
                                <div>
                                    <a href="/detail-peminjaman/{{ $item->id }}" class="mb-1 block">
                                        <h4 class="text-base lg:text-lg font-bold leading-5 lg:leading-none hover:text-red-primary">
                                            {{ $item->book->judul }}
                                        </h4>
                                    </a>
                                    <p class="text-xs">Status: {{ $item->status }}</p>
                                </div>
                                <div
                                    class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                                    {{ $item->pengembalian ?? 'Belum dikembalikan' }}
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-1188.jpg?t=st=1723128546~exp=1723132146~hmac=60f5517bd220ee398300f74c63467166b1b04b98955b12b4f5a4e0fe1f565540&w=740"
                                        class="w-40" alt="" srcset="">
                                </div>
                                <p class="text-base font-semibold text-red-primary">Belum ada riwayat peminjaman</p>
                            </div>
                        @endforelse
                    </div>
                    <div id="slide-display2" class="hidden">
                        @forelse ($fine_histories as $item)
                            <div class="flex justify-between items-center border p-3 rounded-md mb-3">
                                <div>
                                    <a href="/pembayaran-denda/{{ $item->id }}" class="mb-1 block">
                                        <h4 class="text-base lg:text-lg font-bold leading-5 lg:leading-none hover:text-red-primary">
                                            {{ $item->book->judul }}
                                        </h4>
                                    </a>
                                    <p class="text-xs">Status: {{ $item->status }}</p>
                                </div>
                                <div
                                    class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                                    {{ $item->pengembalian ?? 'Belum dibayar' }}
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <div class="flex justify-center">
                                    <img src="https://img.freepik.com/free-vector/graduated-lawyer-concept-illustration_114360-16442.jpg?t=st=1723128770~exp=1723132370~hmac=9ac73f85d25206773b8f0176c293fb1b9f3385b6a9cd0674698acbd55d0c9894&w=740"
                                        class="w-40" alt="" srcset="">
                                </div>
                                <p class="text-base font-semibold text-red-primary">Belum ada riwayat denda</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/riwayat.js"></script>
@endsection
