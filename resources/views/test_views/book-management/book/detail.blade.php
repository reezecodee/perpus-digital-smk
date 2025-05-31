<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
    <form action="" enctype="multipart/form-data" method="post" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Data Buku</h2>
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
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul', $book->judul) }}"
                                        placeholder="Masukkan judul">
                                    @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Author Buku</label>
                                    <input type="text" value="{{ old('author', $book->author) }}"
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
                                    <input type="text" value="{{ old('penerbit', $book->penerbit) }}"
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
                                    <input type="text" value="{{ old('isbn', $book->isbn) }}"
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
                                    <input type="number" value="{{ old('jml_halaman', $book->jml_halaman) }}"
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
                                    </select>
                                    @error('kategori_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Terbit</label>
                                    <input type="text" value="{{ old('tgl_terbit', $book->tgl_terbit) }}"
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
                                    <input type="text" value="{{ old('bahasa', $book->bahasa) }}"
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
                                        <option value="Tersedia" {{ old('status', $book->status) =='Tersedia' ?
                                            'selected' : '' }}>
                                            Tersedia</option>
                                        <option value="Tidak tersedia" {{ old('status', $book->status) =='Tidak
                                            tersedia' ? 'selected'
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
                                        placeholder="Masukkan sinopsis buku">{{ old('sinopsis', $book->sinopsis) }}</textarea>
                                    @error('sinopsis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-librarian.input.cnfrm-checkbox />
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2>Cover Buku</h2>
                        <img src="{{ $book->cover_buku ? " /storage/img/cover/{$book->cover_buku}" :
                        '/img/unknown_cover.png' }}" class="mb-3" alt="" srcset="">
                        @if($book->e_book_file)
                        <a href="">
                            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6l0 13" />
                                    <path d="M12 6l0 13" />
                                    <path d="M21 6l0 13" />
                                </svg> Baca E-Book</button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card mt-3">
        <div class="card-body">
            <h2>Biaya Denda Buku</h2>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Buku Terlambat</label>
                            <input type="text" class="form-control @error('denda_terlambat') is-invalid @enderror"
                                name="denda_terlambat" placeholder="Masukkan nominal denda terlambat">
                            @error('denda_terlambat')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Buku Rusak</label>
                            <input type="text" class="form-control @error('denda_rusak') is-invalid @enderror"
                                name="denda_rusak" placeholder="Masukkan nominal denda rusak">
                            @error('denda_rusak')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Tidak Kembali</label>
                            <input type="text" class="form-control @error('denda_tidak_kembali') is-invalid @enderror"
                                name="denda_tidak_kembali" placeholder="Masukkan nominal denda tidak kembali">
                            @error('denda_tidak_kembali')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
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
</x-test-layout>