<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card mb-3">
        <div class="card-body">
            <h2>Data Rak Buku</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Rak</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $shelf->nama_rak }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label">Kode Rak</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $shelf->kode }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label">Kapasitas Rak</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $shelf->kapasitas }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                    data-bs-target="#modal-report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Tambah Tempat
                </a>
            </div>
            <table id="data-table" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul</th>
                        <th>Jumlah Buku</th>
                        <th>Buku Saat Ini</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.placement', $shelf->id) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'cover_buku',
                        name: 'cover_buku'
                    },
                    {
                        data: 'buku',
                        name: 'buku'
                    },
                    {
                        data: 'jumlah_buku',
                        name: 'jumlah_buku'
                    },
                    {
                        data: 'buku_saat_ini',
                        name: 'buku_saat_ini'
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

    <form action="{{ route('add_placement', $shelf->id) }}" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Tempat Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Buku yang Ingin Ditempatkan</label>
                                    <select name="buku_id" class="form-select @error('buku_id') is-invalid @enderror">
                                        <option value="">-- Pilih Buku --</option>
                                        @foreach($books as $item)
                                        <option value="{{ $item->id }}" {{ old('buku_id')==$item->id ? 'selected' :
                                            '' }}>{{ $item->judul }}</option>
                                        @endforeach
                                    </select>
                                    @error('buku_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Jumlah Buku</label>
                                    <input type="number" value="{{ old('jumlah_buku') }}"
                                        class="form-control @error('jumlah_buku') is-invalid @enderror" name="jumlah_buku"
                                        placeholder="Masukkan jumlah buku">
                                    @error('jumlah_buku')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Jumlah Buku Saat Ini</label>
                                    <input type="number" value="{{ old('buku_saat_ini') }}"
                                        class="form-control @error('buku_saat_ini') is-invalid @enderror" name="buku_saat_ini"
                                        placeholder="Masukkan jumlah buku saat ini">
                                    @error('buku_saat_ini')
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
                            Tambah Tempat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-test-layout>