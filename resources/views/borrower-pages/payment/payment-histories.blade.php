<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            @if ($paymentHistories->isEmpty())
            <div class="flex justify-center">
                <div class="text-center">
                    <img src="/img/assets/no_fine.webp" alt="" srcset="" class="w-52 inline-block">
                    <h1 class="text-black text-center text-lg font-semibold">Tidak ada riwayat pembayaran denda</h1>
                </div>
            </div>
            @else
            <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
                <div class="main-box border border-gray-200 rounded-xl max-w-xl max-lg:mx-auto lg:max-w-full">
                    @foreach ($paymentHistories as $item)
                    <div class="w-full px-3 min-[400px]:px-6">
                        <div class="flex flex-col lg:flex-row items-center py-6 border-b border-gray-200 gap-6 w-full">
                            <a href="{{ route('show.detailPayment', $item->id) }}">
                                <div class="img-box max-lg:w-full">
                                    <img src="{{ asset('storage/img/cover/' . ($item->loan->book->cover_buku ?? '')) }}"
                                        class="w-full lg:max-w-[140px] rounded-md">
                                </div>
                            </a>
                            <div class="flex flex-row items-center w-full ">
                                <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
                                    <div class="flex items-center">
                                        <div class="">
                                            <span class="text-sm font-semibold">Pembayaran denda buku</span>
                                            <a href="{{ route('show.detailPayment', $item->id) }}">
                                                <h2
                                                    class="font-semibold text-xl leading-8 text-black mb-3 hover:text-red-primary">
                                                    {{ $item->loan->book->judul }}
                                                </h2>
                                            </a>
                                            @if($item->status_bayar == 'PAID')
                                            <p
                                                class="font-medium text-sm leading-6 whitespace-nowrap py-0.5 px-3 rounded-full lg:mt-3 bg-emerald-50 text-emerald-600 inline-block">
                                                {{ $item->status_bayar }}
                                            </p>
                                            @else
                                            <p
                                                class="font-medium text-sm leading-6 whitespace-nowrap py-0.5 px-3 rounded-full lg:mt-3 bg-red-50 text-red-600 inline-block">
                                                {{ $item->status_bayar }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3">
                                        <div class="flex items-center max-lg:mt-3">
                                            <div class="flex gap-3 lg:block">
                                                <p class="font-medium text-sm whitespace-nowrap leading-6 text-black">
                                                    Biaya denda</p>
                                                <p class="font-medium text-base whitespace-nowrap leading-7 lg:mt-3">
                                                    @if ($item->loan->keterangan_denda == 'Denda buku rusak')
                                                    {{ formatRupiah($item->loan->book->fine->denda_rusak ?? 0) }}
                                                    @elseif($item->loan->keterangan_denda == 'Denda buku terlambat')
                                                    {{ formatRupiah($item->loan->book->fine->denda_terlambat ?? 0) }}
                                                    @elseif($item->loan->keterangan_denda == 'Denda buku tidak kembali')
                                                    {{ formatRupiah($item->loan->book->fine->denda_tidak_kembali ?? 0)
                                                    }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center max-lg:mt-3">
                                            <div class="flex gap-3 lg:block">
                                                <p class="font-medium text-sm whitespace-nowrap leading-6 text-black">
                                                    Kode peminjaman</p>
                                                <p class="font-medium text-base whitespace-nowrap leading-7 lg:mt-3">
                                                    {{ $item->loan->kode_peminjaman }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center max-lg:mt-3">
                                            <div class="flex gap-3 lg:block">
                                                <p class="font-medium text-sm whitespace-nowrap leading-6 text-black">
                                                    Tanggal bayar</p>
                                                <p class="font-medium text-base whitespace-nowrap leading-7 lg:mt-3">
                                                    {{ $item->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
</x-borrower-layout>