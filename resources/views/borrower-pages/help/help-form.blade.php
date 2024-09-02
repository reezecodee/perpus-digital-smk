<x-borrower-layout :title="$title" :bubble="false">
    <section class="container mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <div class="flex">
                <div class="self-start w-full border shadow-md rounded-md p-4">
                    <h1 class="text-lg lg:text-xl font-bold mb-1">Laporkan Masalah
                    </h1>
                    <hr class="mb-3">
                    <form action="{{ route('send_report') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="block mb-1 font-semibold text-sm text-gray-900 ">Subject
                                laporan</label>
                            <input type="text" id="subject"
                                class="bg-gray-50 font-semibold border border-gray-300 text-gray-900 text-sm rounded-lg @error('subject') ring-red-primary border-red-primary @enderror focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                                name="subject" value="{{ old('subject') }}" placeholder="Masukkan subject laporan" autocomplete="off" required />
                            @error('subject')
                                <span class="text-red-primary text-sm font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="block mb-1 text-sm font-semibold text-gray-900 ">Pilih opsi
                                kategori</label>
                            <select id="kategori" name="kategori"
                                class="bg-gray-50 font-semibold border border-gray-300 text-gray-900 text-sm rounded-lg @error('kategori') ring-red-primary border-red-primary @enderror focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                                <option value="{{ old('kategori') ? old('kategori') : '' }}" selected>{{ old('kategori') ? old('kategori') : 'Pilih kategori' }}</option>
                                <option value="Fitur aplikasi">Fitur aplikasi</option>
                                <option value="Bug">Bug</option>
                                <option value="Saran">Saran</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('kategori')
                                <span class="text-red-primary text-sm font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="block mb-1 text-sm font-semibold text-gray-900">Keterangan
                                laporan</label>
                            <textarea id="message" name="laporan" rows="4"
                                class="block font-semibold p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('laporan') ring-red-primary border-red-primary @enderror border-gray-300 focus:ring-red-500 focus:border-red-500" autocomplete="off"
                                placeholder="Masukkan keterangan laporan Anda">{{ old('laporan') }}</textarea>
                            @error('laporan')
                                <span class="text-red-primary text-sm font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium cursor-pointer text-gray-900">Saya
                                yakin
                                data tersebut sudah benar</label>
                        </div>
                        <div class="flex justify-end">
                            <div class="text-end">
                                <x-borrower.button.confirm-btn modaltarget="report-modal">
                                    Kirim laporan
                                </x-borrower.button.confirm-btn>
                            </div>
                        </div>
                        <x-borrower.modal.confirm-modal
                            question="Apakah Anda yakin ingin mengirimkan laporan ini?. Maksimal pengiriman laporan adalah 2x dalam sehari."
                            okbtn="Ya, kirimkan" nobtn="Batalkan" modalname="report-modal" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
