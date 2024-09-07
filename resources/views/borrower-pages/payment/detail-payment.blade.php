<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="grid grid-cols-2 gap-4">
                <div class="border rounded-lg p-6">
                    <div class="flex justify-between gap-5">
                        <img src="{{ asset('storage/img/pembayaran/' . ($data->bukti_pembayaran ?? '')) }}" alt=""
                            class="w-52 rounded-md" srcset="">
                        <div class="text-justify font-semibold text-sm">
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, tempora!
                            </p>
                            <div class="flex justify-between items-center">
                                <x-borrower.button.normal-btn>Transfer ulang</x-borrower.button.normal-btn>
                                <a href="" class="font-bold text-red-primary underline">Laporkan masalah</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-6">
                    <div class="grid grid-cols-2 border-b">
                        <div class="mb-2">
                            <label for="" class="block font-semibold text-xs">Judul</label>
                            <p class="font-bold">{{ $data->loan->placement->book->judul }}</p>
                        </div>
                        <div class="mb-2">
                            <label for="" class="block font-semibold text-xs">Kode peminjaman</label>
                            <p class="font-bold">{{ $data->loan->kode_peminjaman }}</p>
                        </div>
                        <div class="mb-2">
                            <label for="" class="block font-semibold text-xs">Tanggal bayar</label>
                            <p class="font-bold">{{ $data->created_at }}</p>
                        </div>
                        <div>
                            <label for="" class="block font-semibold text-xs">Status pembayaran</label>
                            <p class="font-bold">{{ $data->status_bayar }}</p>
                        </div>
                    </div>
                    <div class="my-2">
                        @if ($data->status_bayar == 'Pembayaran ditolak')
                            <label for="" class="block font-semibold text-xs">Alasan ditolak</label>
                            <p class="font-bold text-justify">
                                {{ $data->alasan_ditolak ?? 'Petugas tidak memberikan alasan penolakan' }}</p>
                        @elseif($data->status_bayar == 'Menunggu konfirmasi')
                            <label for="" class="block font-semibold text-xs">Informasi</label>
                            <p class="font-bold text-justify">
                                Terima kasih telah melakukan pembayaran denda buku. Pembayaran Anda sedang kami proses
                                dan menunggu konfirmasi. Kami akan segera menghubungi Anda setelah pembayaran
                                terverifikasi. Terima kasih atas kesabaran dan kerja sama Anda!
                            </p>
                        @else
                            <label for="" class="block font-semibold text-xs">Informasi</label>
                            <p class="font-bold text-justify">
                                Terima kasih telah mematuhi aturan dan menyelesaikan pembayaran denda buku. Kami
                                menghargai kerja sama Anda dalam menjaga keteraturan perpustakaan. Semoga Anda terus
                                menikmati layanan kami dan menemukan banyak buku menarik lainnya untuk dibaca!
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
