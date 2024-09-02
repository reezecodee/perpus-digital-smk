<x-borrower-layout :title="$title">
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <div class="pt-24 lg:pt-36">
            <h1 class="font-extrabold text-3xl mb-2"><i class="fa-solid fa-clipboard-list text-red-primary"></i> Daftar
                kunjungan saya
            </h1>
            <hr class="mb-3">
            <div class="flex gap-7">
                <div class="w-full self-start shadow-md rounded-md p-3">
                    <table id="data-table" datatable>
                        <thead>
                            <th>Tgl kunjungan</th>
                            <th>Keterangan</th>
                            <th>Status kunjungan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($visits as $item)
                                <tr class="text-center">
                                    <td>{{ $item->tanggal_kunjungan }}</td>
                                    <td class="truncate-text">{{ $item->keterangan_kunjungan }}</td>
                                    <td>{{ $item->status_kunjungan }}</td>
                                    <td>
                                        @if ($item->status_kunjungan != 'Diterima')
                                            <button data-modal-target="popup-modal{{ $loop->iteration }}"
                                                data-modal-toggle="popup-modal{{ $loop->iteration }}" type="button"
                                                class="py-2 px-3 rounded-md bg-red-primary hover:bg-red-500 text-white duration-300"><i
                                                    class="fas fa-trash"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                <x-borrower.modal.delete-visit-modal :id="$item->id" :iteration="$loop->iteration" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="max-w-md w-full self-start shadow-md rounded-md p-3 font-medium">
                    <form action="" method="post">
                        @csrf
                        <h3 class="text-lg font-semibold"><i class="fa-solid fa-calendar text-red-primary"></i> Form
                            kunjungan</h3>
                        <hr class="my-2">
                        <div class="mb-3">
                            <label class="block mb-2 font-medium text-gray-900">Tanggal kunjungan</label>
                            <input type="date" value="{{ date('Y-m-d') }}" name="tanggal_kunjungan"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-red-500 focus:border-red-500"
                                disabled required>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 font-medium text-gray-900">Keterangan kunjungan</label>
                            <textarea rows="5" name="keterangan_kunjungan" placeholder="Keterangan kunjungan Anda"
                                class="block w-full p-2 text-gray-900 border border-gray-300 @error('keterangan_kunjungan') border-red-primary @enderror rounded-lg bg-gray-50 text-base focus:ring-red-500 focus:border-red-500"
                                required>{{ old('keterangan_kunjungan') }}</textarea>
                            @error('keterangan_kunjungan')
                                <span class="text-red-primary font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <input id="default-checkbox" type="checkbox" name="ttd" value="setuju"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer"
                                required>
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 cursor-pointer">Saya
                                <b>{{ auth()->user()->nama }}</b> menandatangani kunjungan ini.</label>
                        </div>
                        <div class="flex justify-end">
                            <x-borrower.button.confirm-btn modaltarget="visit-modal">
                                Ajukan kunjungan
                            </x-borrower.button.confirm-btn>
                        </div>
                        <x-borrower.modal.confirm-modal question="Apakah Anda yakin ingin mengajukan permohonan?. Maksimal pengajuan kunjungan adalah 2x sehari"
                            okbtn="Ya, ajukan" nobtn="Batalkan" modalname="visit-modal" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-borrower-layout>
