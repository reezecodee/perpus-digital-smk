<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                        </svg>
                        Print
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">PDF</a></li>
                        <li><a class="dropdown-item">Excel</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-database-import">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                            <path d="M4 6v6c0 1.657 3.582 3 8 3c.856 0 1.68 -.05 2.454 -.144m5.546 -2.856v-6" />
                            <path d="M4 12v6c0 1.657 3.582 3 8 3c.171 0 .341 -.002 .51 -.006" />
                            <path d="M19 22v-6" />
                            <path d="M22 19l-3 -3l-3 3" />
                        </svg>
                        Import Via Excel
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">Import langsung</a></li>
                        <li><a class="dropdown-item">Download format</a></li>
                    </ul>
                </div>
            </div>

            <table id="data-table" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Pengembalian</th>
                        <th>Status</th>
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
                ajax: "{{ route('datatable.loan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_peminjaman',
                        name: 'kode_peminjaman',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'buku',
                        name: 'buku'
                    },
                    {
                        data: 'peminjaman',
                        name: 'peminjaman'
                    },
                    {
                        data: 'pengembalian',
                        name: 'pengembalian'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
                        <h5 class="modal-title">Buat Peminjaman Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Siswa Peminjam</label>
                                    <select name="peminjam_id"
                                        class="form-select @error('peminjam_id') is-invalid @enderror">
                                        <option value="">-- Pilih Peminjam --</option>
                                        @foreach($students as $item)
                                        <option value="{{ $item->id }}" {{ old('peminjam_id')==$item->id ? 'selected' :
                                            '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('peminjam_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Buku yang Ingin Dipinjam</label>
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
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Ambil Di Rak</label>
                                    <select name="penempatan_id"
                                        class="form-select @error('penempatan_id') is-invalid @enderror">
                                        <option value="">-- Pilih Rak --</option>
                                        @foreach($placements as $item)
                                        <option value="{{ $item->id }}" {{ old('penempatan_id')==$item->id ? 'selected'
                                            :
                                            '' }}>{{ $item->shelf->nama_rak }}</option>
                                        @endforeach
                                    </select>
                                    @error('penempatan_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" value="{{ old('peminjaman') }}"
                                        class="form-control @error('peminjaman') is-invalid @enderror" name="peminjaman"
                                        placeholder="Masukkan tanggal peminjaman">
                                    @error('peminjaman')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" value="{{ old('pengembalian') }}"
                                        class="form-control @error('pengembalian') is-invalid @enderror"
                                        name="pengembalian" placeholder="Masukkan tanggal pengembalian">
                                    @error('pengembalian')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Jatuh Tempo</label>
                                    <input type="date" value="{{ old('jatuh_tempo') }}"
                                        class="form-control @error('jatuh_tempo') is-invalid @enderror"
                                        name="jatuh_tempo" placeholder="Masukkan tanggal jatuh_tempo">
                                    @error('jatuh_tempo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Keterangan</label>
                                    <textarea cols="5" rows="5"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        placeholder="Masukkan keterangan peminjaman">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Status Peminjaman</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">-- Pilih Status Peminjaman --</option>
                                        <option value="Menunggu persetujuan" {{ old('status')=='Menunggu persetujuan'
                                            ? 'selected' : '' }}>
                                            Menunggu persetujuan</option>
                                        <option value="Masa pinjam" {{ old('status')=='Masa pinjam' ? 'selected' : ''
                                            }}>
                                            Masa pinjam</option>
                                        <option value="Menunggu diambil" {{ old('status')=='Menunggu diambil'
                                            ? 'selected' : '' }}>
                                            Menunggu diambil</option>
                                        <option value="Ditolak" {{ old('status')=='Ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
                                    </select>
                                    @error('jk')
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
                            Buat Data Peminjaman
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-test-layout>