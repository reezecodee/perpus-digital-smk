<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            @if ($data->status == 'Terkena denda')
                <div class="p-4 font-medium text-sm text-red-800 rounded-lg bg-red-100 mb-5" role="alert">
                    Status peminjaman kamu terkena denda, harap lakukan pembayaran denda.
                </div>
            @endif
            <div class="flex justify-between mb-5">
                <a href="{{ route('show.myBookShelf') }}">
                    <x-borrower.button.normal-btn>
                        <i class="fa-solid fa-circle-chevron-left"></i> Kembali ke rak
                    </x-borrower.button.normal-btn>
                </a>
                <a href="{{ route('show.history') }}">
                    <x-borrower.button.normal-btn>
                        Kembali ke riwayat <i class="fa-solid fa-circle-chevron-right"></i>
                    </x-borrower.button.normal-btn>
                </a>
            </div>
            @if ($data->status !== 'Terkena denda')
                <div class="border p-4 mb-5">
                    <h3 class="text-lg font-bold mb-5">Status peminjaman</h3>
                    <div class="flex justify-between lg:justify-around items-center">
                        <div class="flex flex-col items-center text-center lg:text-left">
                            <div
                                class="bg-red-primary text-white rounded-full h-16 w-16 flex justify-center items-center mb-3">
                                <i class="fas fa-hourglass-start text-lg"></i>
                            </div>
                            <div class="text-sm">Masa peminjaman</div>
                        </div>
                        <div class="flex flex-col items-center text-center lg:text-left">
                            <div
                                class="@if ($data->status == 'Masa pengembalian' || $data->status == 'Sudah dikembalikan') bg-red-primary text-white @else
                            border-4 border-red-primary text-red-primary @endif rounded-full h-16 w-16 flex justify-center items-center mb-3">
                                <i class="fas fa-receipt text-lg"></i>
                            </div>
                            <div class="text-sm">Masa pengembalian</div>
                        </div>
                        <div class="flex flex-col items-center text-center lg:text-left">
                            <div
                                class="@if ($data->status == 'Sudah dikembalikan') bg-red-primary text-white @else
                            border-4 border-red-primary text-red-primary @endif rounded-full h-16 w-16 flex justify-center items-center mb-3">
                                <i class="fas fa-thumbs-up text-lg"></i>
                            </div>
                            <div class="text-sm">Telah dikembalikan</div>
                        </div>
                    </div>
                    @if ($data->status == 'Masa pinjam')
                        <div class="p-4 mt-5 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                            Saat ini status peminjaman masih dalam masa peminjaman, silahkan nikmati membaca bukumu.
                        </div>
                    @elseif($data->status == 'Masa pengembalian')
                        <div class="p-4 mt-5 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                            Sudah saatnya kamu mengembalikan buku, ayo kembalikan bukumu sebelum jatuh tempo dan
                            terhindar dari
                            denda keterlambatan,
                        </div>
                    @else
                        <div class="p-4 mt-5 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                            Terimakasih sudah mengembalikan bukumu, semoga apa yang kamu baca menjadi ilmu yang
                            bermanfaat.
                        </div>
                    @endif
                </div>
            @endif
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Detail buku</h3>
                <div class="flex justify-center lg:justify-normal gap-5 mb-4">
                    <img src="{{ asset('storage/img/cover/' . ($data->placement->book->cover_buku ?? 'unknown_cover.jpg')) }}"
                        alt="" srcset="" class="rounded-md w-48 self-start">
                    <div class="hidden lg:block">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Author
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $data->placement->book->author }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    ISBN
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->isbn }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Penerbit
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $data->placement->book->penerbit }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Tanggal terbit
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->tgl_terbit }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Kategori
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->category->nama_kategori }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Jumlah halaman
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->jml_halaman }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Bahasa
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->bahasa }}</td>
                            </tr>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Format
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $data->placement->book->format }}</td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold mb-5">{{ $data->placement->book->judul }}</h1>
                        <h1 class="text-2xl font-bold">Sinopsis/Deskripsi</h1>
                        <p class="text-justify">{{ $data->placement->book->sinopsis }}
                        </p>
                    </div>
                </div>
                <div class="block lg:hidden mb-5 lg:mb-0">
                    <h1 class="text-xl font-bold mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Fugit,
                        nulla.</h1>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <tr class="border-none lg:border">
                            <th scope="row" class="px-3 lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Pengarang
                            </th>
                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap">Lorem ipsum dolor sit amet</td>
                        </tr>
                        <tr class="border-none lg:border">
                            <th scope="row" class="px-3 lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Penerbit
                            </th>
                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap">Lorem ipsum dolor sit amet</td>
                        </tr>
                        <tr class="border-none lg:border">
                            <th scope="row" class="px-3 lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                ISBN
                            </th>
                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap">93294828934234</td>
                        </tr>
                        <tr class="border-none lg:border">
                            <th scope="row" class="px-3 lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Jumlah halaman
                            </th>
                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap">200</td>
                        </tr>
                        <tr class="border-none lg:border">
                            <th scope="row" class="px-3 lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Barcode
                            </th>
                            <td class="px-4 lg:px-6 py-4 whitespace-nowrap">192831232</td>
                        </tr>
                    </table>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="bg-gray-100">
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Tanggal pinjam
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Jatuh tempo
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Tanggal pengembalian
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Kode peminjaman
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->peminjaman }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->jatuh_tempo }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->pengembalian ?? '-' }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->kode_peminjaman }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="border p-4 mb-5">
                <h3 class="text-lg font-bold mb-5">Informasi denda</h3>
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="bg-gray-100">
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Status denda Anda
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Keterangan denda
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Denda buku terlambat
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Denda buku rusak
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Denda buku tidak kembali
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    @if ($data->status == 'Terkena denda' && $data->keterangan_denda != 'Tidak ada')
                                        {{ $data->status }}
                                    @else
                                        Anda tidak terkena denda
                                    @endif
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->keterangan_denda }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ formatRupiah($data->placement->book->fine->denda_terlambat) }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ formatRupiah($data->placement->book->fine->denda_rusak) }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ formatRupiah($data->placement->book->fine->denda_tidak_kembali) }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
