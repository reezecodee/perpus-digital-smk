<x-profile-layout :title="$title">
    <x-slot name="content">
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
                            <a href="{{ route('show.detailRent', $item->id) }}" class="mb-1 block">
                                <h4
                                    class="text-base lg:text-lg font-bold leading-5 lg:leading-none hover:text-red-primary">
                                    {{ $item->book->judul }}
                                </h4>
                            </a>
                            <p class="text-xs">Status: {{ $item->status }}</p>
                        </div>
                        <div class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                            {{ $item->pengembalian ?? 'Belum dikembalikan' }}
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img src="/img/assets/history.webp" class="w-40" alt="" srcset="">
                        </div>
                        <p class="text-base font-semibold text-red-primary">Belum ada riwayat peminjaman</p>
                    </div>
                @endforelse
            </div>
            <div id="slide-display2" class="hidden">
                @forelse ($fineHistories as $item)
                    <div class="flex justify-between items-center border p-3 rounded-md mb-3">
                        <div>
                            <a href="{{ route('show.payment', $item->id) }}" class="mb-1 block">
                                <h4
                                    class="text-base lg:text-lg font-bold leading-5 lg:leading-none hover:text-red-primary">
                                    {{ $item->placement->book->judul }}
                                </h4>
                            </a>
                            <p class="text-xs">Status: {{ $item->status }}</p>
                        </div>
                        <div class="py-1 px-3 rounded-lg lg:text-sm font-semibold text-white bg-red-primary text-xs">
                            {{ $item->pengembalian ?? 'Belum dibayar' }}
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img src="/img/assets/no_fine.webp" class="w-40" alt="" srcset="">
                        </div>
                        <p class="text-base font-semibold text-red-primary">Belum ada riwayat denda</p>
                    </div>
                @endforelse
            </div>
        </div>
        <script src="/js/riwayat.js"></script>
    </x-slot>
</x-profile-layout>
