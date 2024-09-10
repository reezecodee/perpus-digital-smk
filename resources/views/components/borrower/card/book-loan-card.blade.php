<div
    class="border p-5 rounded-md @if ($item->status == 'Masa pengembalian') bg-yellow-50 @elseif($item->status == 'Terkena denda') bg-red-100 @endif shadow-md w-full mb-7 relative overflow-hidden">
    <div class="flex justify-end">
        <div class="bg-red-primary text-white text-xs p-1 absolute right-0 w-40 top-0 text-center font-medium">
            {{ $item->status }}</div>
    </div>
    <div class="flex w-full mb-4">
        <img src="{{ asset('storage/img/cover/' . ($item->placement->book->cover_buku ?? 'unknown_cover.jpg')) }}"
            class="rounded-md w-28 self-start" loading="lazy">
        <div class="text-xs ml-5 self-start w-full">
            <a href="{{ route('show.bookDetail', $item->placement->book->id) }}">
                <h1 class="text-base lg:text-lg font-bold mb-1">{{ $item->placement->book->judul }}</h1>
            </a>
            <div class="mb-3 font-medium grid grid-cols-1 lg:grid-cols-4 gap-x-3">
                <p><span class="font-bold text-red-primary">Author: </span> {{ $item->placement->book->author }}
                </p>
                <p><span class="font-bold text-red-primary">Penerbit:</span> {{ $item->placement->book->penerbit }}
                </p>
                <p><span class="font-bold text-red-primary">Tgl pinjam:</span> {{ $item->peminjaman }}
                </p>
                <p><span class="font-bold text-red-primary">Kategori:</span> {{ $item->placement->book->category->nama_kategori }}</p>
                <p><span class="font-bold text-red-primary">Kode rak:</span> 131231231</p>
                <p><span class="font-bold text-red-primary">ISBN:</span> {{ $item->placement->book->isbn }}</p>
                <p><span class="font-bold text-red-primary">Halaman:</span>
                    {{ $item->placement->book->jml_halaman }}
                    halaman</p>
                <p><span class="font-bold text-red-primary">Jatuh tempo: </span>
                    {{ $item->jatuh_tempo }}</p>
            </div>
            <div class="flex justify-between mt-4">
                <div>
                    <a href="{{ route('show.detailRent', $item->id) }}">
                        <button
                            class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mr-2">Lihat
                            detail</button>
                    </a>
                    <button type="button"
                        class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2.5 font-bold"
                        data-modal-target="popup-modal" data-modal-toggle="popup-modal">Kembalikan
                        buku</button>
                </div>
                <div class="flex justify-end text-center">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <p>{!! barcode($item->placement->book->isbn, 1, 40) !!}</p>
                        </div>
                        <p class="font-medium font-ibm-plex-mono text-center">ISBN {{ $item->placement->book->isbn }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
