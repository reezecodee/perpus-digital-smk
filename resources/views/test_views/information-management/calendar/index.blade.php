<x-test-layout :title="$title" :page-title="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <table id="data-table" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>Warna</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="/js/calendar.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.calendar') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai',
                    },
                    {
                        data: 'tanggal_selesai',
                        name: 'tanggal_selesai',
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },
                    {
                        data: 'warna',
                        name: 'warna',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false, 
                        searchable: false
                    },
                ]
            });
        });
    </script>

    <form action="" autocomplete="off" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kirim Notifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" value="{{ old('keterangan') }}"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        placeholder="Masukkan keterangan">
                                    @error('keterangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Warna Tanda Kalender</label>
                                    <select name="warna" class="form-select" id="">
                                        <option value="">-- Pilih Warna Tanda --</option>
                                        <option value="Merah" {{ old('warna') == 'Merah' }}>Merah</option>
                                        <option value="Kuning" {{ old('warna') == 'Kuning' }}>Kuning</option>
                                        <option value="Hijau" {{ old('warna') == 'Hijau' }}>Hijau</option>
                                    </select>
                                    @error('warna')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Tanggal Mulai</label>
                                    <input type="date" value="{{ old('tanggal_mulai') }}"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai"
                                        placeholder="Masukkan tanggal mulai">
                                    @error('tanggal_mulai')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Tanggal Selesai</label>
                                    <input type="date" value="{{ old('tanggal_selesai') }}"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai"
                                        placeholder="Masukkan tanggal selesai">
                                    @error('tanggal_selesai')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-librarian.input.cnfrm-checkbox />
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Batalkan
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Tambahkan Jadwal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-test-layout>