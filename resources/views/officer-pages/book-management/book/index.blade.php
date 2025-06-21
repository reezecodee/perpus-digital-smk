<x-officer-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
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
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Author</th>
                        <th>ISBN</th>
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
                ajax: "{{ route('datatable.book', $lowerCaseFormat) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'cover_buku',
                        name: 'cover_buku',
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'isbn',
                        name: 'isbn'
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

    <form action="{{ route('store_book', $format) }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku {{ $format }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img id="preview" src="/img/unknown_cover.png"
                                style="width: 100%; max-width: 200px; height: auto; aspect-ratio: 650 / 974; object-fit: contain; border: 1px solid #ccc;" />
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <input type="file" name="cover_buku" id="fileInput" accept=".jpg, .jpeg, .png"
                                style="display: none">
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('fileInput').click()">Upload
                                Cover</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Judul Buku</label>
                                    <input type="text" value="{{ old('judul') }}"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul"
                                        placeholder="Masukkan judul">
                                    @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Author Buku</label>
                                    <input type="text" value="{{ old('author') }}"
                                        class="form-control @error('author') is-invalid @enderror" name="author"
                                        placeholder="Masukkan author">
                                    @error('author')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Penerbit Buku</label>
                                    <input type="text" value="{{ old('penerbit') }}"
                                        class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                                        placeholder="Masukkan penerbit">
                                    @error('penerbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">ISBN</label>
                                    <input type="text" value="{{ old('isbn') }}"
                                        class="form-control @error('isbn') is-invalid @enderror" name="isbn"
                                        placeholder="Masukkan ISBN">
                                    @error('isbn')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Jumlah Halaman</label>
                                    <input type="number" value="{{ old('jml_halaman') }}"
                                        class="form-control @error('jml_halaman') is-invalid @enderror"
                                        name="jml_halaman" placeholder="Masukkan jumlah halaman">
                                    @error('jml_halaman')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Kategori</label>
                                    <select name="kategori_id"
                                        class="form-select @error('kategori_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ old('kategori_id')==$item->id ? 'selected' :
                                            '' }}>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Terbit</label>
                                    <input type="text" value="{{ old('tgl_terbit') }}"
                                        class="form-control @error('tgl_terbit') is-invalid @enderror" name="tgl_terbit"
                                        placeholder="Masukkan tahun/tanggal terbit">
                                    @error('tgl_terbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Bahasa</label>
                                    <input type="text" value="{{ old('bahasa') }}"
                                        class="form-control @error('bahasa') is-invalid @enderror" name="bahasa"
                                        placeholder="Masukkan bahasa buku">
                                    @error('bahasa')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Status Buku</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="">-- Pilih Status Buku --</option>
                                        <option value="Tersedia" {{ old('status')=='Tersedia' ? 'selected' : '' }}>
                                            Tersedia</option>
                                        <option value="Tidak tersedia" {{ old('status')=='Tidak tersedia' ? 'selected'
                                            : '' }}>
                                            Tidak tersedia</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Sinopsis/Deskripsi buku</label>
                                    <textarea cols="5" rows="5"
                                        class="form-control @error('sinopsis') is-invalid @enderror" name="sinopsis"
                                        placeholder="Masukkan sinopsis buku">{{ old('sinopsis') }}</textarea>
                                    @error('sinopsis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @if($format == 'Elektronik')
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Upload E-Book File</label>
                                    <input type="file" accept=".pdf" class="form-control" name="e_book_file" id="">
                                    @error('e_book_file')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            @if($format !== 'Elektronik')
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Denda Terlambat (Rp)</label>
                                    <input type="number" value="{{ old('denda_terlambat') }}"
                                        class="form-control @error('denda_terlambat') is-invalid @enderror" name="denda_terlambat"
                                        placeholder="Masukkan denda terlambat">
                                    @error('denda_terlambat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Denda Buku Rusak (Rp)</label>
                                    <input type="number" value="{{ old('denda_rusak') }}"
                                        class="form-control @error('denda_rusak') is-invalid @enderror" name="denda_rusak"
                                        placeholder="Masukkan denda buku rusak">
                                    @error('denda_rusak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Denda Buku Tidak Kembali (Rp)</label>
                                    <input type="number" value="{{ old('denda_tidak_kembali') }}"
                                        class="form-control @error('denda_tidak_kembali') is-invalid @enderror" name="denda_tidak_kembali"
                                        placeholder="Masukkan denda buku tidak kembali">
                                    @error('denda_tidak_kembali')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif
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
                            Tambah Buku {{ $format }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
            preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '/img/unknown_cover.png';
        }
        });
    </script>
</x-officer-layout>