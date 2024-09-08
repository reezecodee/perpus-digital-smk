<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="grid grid-cols-2 gap-4">
                <div class="border rounded-lg p-6 self-start">
                    <div class="flex justify-between gap-7">
                        <img src="{{ asset('storage/img/pembayaran/' . ($data->bukti_pembayaran ?? '')) }}" alt=""
                            class="w-52 rounded-md" srcset="">
                        <div class="text-justify font-semibold text-sm">
                            @if ($data->status_bayar == 'Menunggu konfirmasi')
                                <p class="mb-3">Pembayaran denda Anda masih dalam proses konfirmasi, jika Anda merasa
                                    ada kesalahan dalam upload bukti, Anda dapat memperbaruinya.
                                </p>
                            @elseif($data->status_bayar == 'Pembayaran ditolak')
                                <p class="mb-3">Pembayaran denda Anda ditolak, Lihat alasannya kenapa pembayaranmu
                                    ditolak. Jika kamu merasa ada yang salah, kamu bisa melaporkannya di link yang
                                    tertera.
                                </p>
                            @else
                                <p class="mb-3">Pembayaranmu telah sukses, terimakasih atas kepatuhan Anda dalam
                                    menjaga ekosistem perpustakaan.
                                </p>
                            @endif
                            <div class="flex justify-between items-center">
                                @if ($data->status_bayar != 'Sudah dibayar')
                                    <a href="{{ route('payment', $data->loan->id) }}">
                                        <x-borrower.button.normal-btn>Transfer ulang</x-borrower.button.normal-btn>
                                    </a>
                                @endif
                                <a href="{{ route('report_problem') }}"
                                    class="font-bold hover:text-red-500 hover:no-underline text-red-primary underline">Laporkan
                                    masalah</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-6 self-start">
                    <div class="grid grid-cols-2 border-b">
                        <div class="mb-2">
                            <label for="" class="block font-semibold text-xs">Judul buku didenda</label>
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
                            <p class="font-semibold text-sm text-justify">
                                {{ $data->alasan_ditolak ?? 'Petugas tidak memberikan alasan penolakan' }}</p>
                        @elseif($data->status_bayar == 'Menunggu konfirmasi')
                            <label for="" class="block font-semibold text-xs">Informasi</label>
                            <p class="font-semibold text-sm text-justify">
                                Terima kasih telah melakukan pembayaran denda buku. Pembayaran Anda sedang kami proses
                                dan menunggu konfirmasi. Kami akan segera menghubungi Anda setelah pembayaran
                                terverifikasi. Terima kasih atas kesabaran dan kerja sama Anda!
                            </p>
                        @else
                            <label for="" class="block font-semibold text-xs">Informasi</label>
                            <p class="font-semibold text-sm text-justify">
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
