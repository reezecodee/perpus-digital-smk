<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            {{-- {{ session('error') }} --}}
            <form method="post" action="{{ route('create_loan') }}">
                @csrf
                <div class="flex flex-wrap justify-between">
                    <div class="self-start max-w-2xl w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Data peminjam <i
                                    class="fas fa-user text-red-primary"></i>
                            </h2>
                            <hr class="mb-4">
                            <div class="flex justify-between items-center">
                                <p class="font-semibold text-base">{{ auth()->user()->nama }} |
                                    {{ auth()->user()->telepon }}</p>
                            </div>
                            <p class="text-sm mb-2 font-medium"><i class="fas fa-envelope text-red-primary"></i>
                                {{ auth()->user()->email }}
                            </p>
                            <textarea id="message" name="keterangan" rows="3"
                                class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border @error('keterangan') ring-red-primary border-red-primary @enderror focus:ring-red-500 focus:border-red-500 outline-none"
                                placeholder="Catatan peminjaman (opsional)"></textarea>
                            @error('keterangan')
                                <span class="text-sm font-semibold text-red-primary">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Buku yang dipinjam <i
                                    class="fas fa-book text-red-primary"></i></h2>
                            <hr class="mb-4">
                            <div class="flex gap-7 mb-0 lg:mb-3">
                                <img src="{{ asset('storage/img/cover/' . ($data->cover_buku ?? 'unknown_cover.jpg')) }}"
                                    alt="" width="100" class="rounded-md self-start">
                                <div class="self-start w-full">
                                    <h3 class="font-bold text-lg mb-2">{{ $data->judul }}</h3>
                                    <p class="font-semibold text-sm mb-1">Durasi pinjam</p>
                                    <input type="date" name="jatuh_tempo" min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 @error('jatuh_tempo') ring-red-primary border-red-primary @enderror text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                                    @error('jatuh_tempo')
                                        <span class="text-sm font-semibold text-red-primary">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1.5">Pilih rak buku <i
                                    class="fas fa-table text-red-primary"></i></h2>
                            <hr class="mb-4">
                            <ul class="grid w-full gap-6 md:grid-cols-3">
                                @forelse ($shelves as $item)
                                    <li>
                                        <input type="radio" id="shelf-option-{{ $loop->iteration }}"
                                            name="penempatan_id" value="{{ $item['placement']->id }}"
                                            class="hidden peer" required>
                                        <label for="shelf-option-{{ $loop->iteration }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-primary peer-checked:bg-red-50 hover:text-gray-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">
                                                    {{ $item['shelf']->nama_rak }}</div>
                                                <div class="w-full text-sm">Tersedia:
                                                    {{ $item['placement']->buku_saat_ini }}</div>
                                            </div>
                                        </label>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="self-start max-w-full lg:max-w-md w-full">
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1"><i class="fas fa-wallet text-red-primary"></i> Biaya
                                denda
                            </h2>
                            <p class="mb-2 text-sm font-semibold text-red-primary">Total denda yang harus kamu bayarkan
                                jika
                                buku
                                rusak, tidak kembali, dan terlambat.
                            </p>
                            <hr class="mb-4">
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/3982/3982575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku rusak <br><span
                                            class="text-base">
                                            {{ formatRupiah($data->fine->denda_rusak ?? 0) }}</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/12376/12376575.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku tidak kembali <br><span
                                            class="text-base">
                                            {{ formatRupiah($data->fine->denda_tidak_kembali ?? 0) }}</span></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/128/1407/1407089.png" alt=""
                                    width="50">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold mr-0 lg:mr-40">Denda buku terlambat <br><span
                                            class="text-base">{{ formatRupiah($data->fine->denda_terlambat ?? 0) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full rounded-xl border p-4 mb-5">
                            <h2 class="text-xl font-bold mb-1">Konfirmasi peminjaman</h2>
                            <hr class="mb-4">
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Penting!</span> Jika kamu sengaja tidak melakukan
                                    pembayaran
                                    denda, pihak perpustakaan akan melakukan tindakan hukum sesuai dengan aturan yang
                                    berlaku. Meminjam artinya setuju dengan peraturan perpustakaan.
                                </div>
                            </div>
                            <hr class="border-2 bg-gray-400 mb-3">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer"
                                    required>
                                <label for="default-checkbox"
                                    class="ms-4 text-sm font-medium text-gray-900 dark:text-gray-300 text-justify cursor-pointer">Saya
                                    <b>{{ auth()->user()->nama }}</b>, bersedia ditindak jalur hukum apabila saya
                                    dengan
                                    sengaja tidak
                                    membayar denda jika saya menghilangkan, merusak, dan terlambat mengembalikan
                                    buku.</label>
                            </div>
                            <x-borrower.button.confirm-loan-btn modaltarget="loan-modal">
                                Konfirmasi peminjaman
                            </x-borrower.button.confirm-loan-btn>
                            <x-borrower.modal.confirm-modal
                                question="Pastikan Anda sudah membaca aturan dan menyetujui kebijakan peminjaman buku"
                                okbtn="Ya, pinjam sekarang" :nomargin="true" nobtn="Batalkan"
                                modalname="loan-modal" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-borrower-layout>
