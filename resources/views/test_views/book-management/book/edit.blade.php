<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <form action="{{ route('update_book', ['format' => $format, 'id' => $book->id]) }}" enctype="multipart/form-data"
        method="post" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h2>Data Buku</h2>
                <div class="d-flex justify-content-center mb-3">
                    <img id="preview" src="{{ $book->cover_buku ? " /storage/img/cover/{$book->cover_buku}" :
                    '/img/unknown_cover.png' }}"
                    style="width: 100%; max-width: 200px; height: auto; aspect-ratio: 650 / 974; object-fit: contain;
                    border: 1px solid #ccc;" />
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
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                value="{{ old('judul', $book->judul) }}" placeholder="Masukkan judul">
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
                                class="form-control @error('jml_halaman') is-invalid @enderror" name="jml_halaman"
                                placeholder="Masukkan jumlah halaman">
                            @error('jml_halaman')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id', $book->category->id) == $item->id
                                    ? 'selected' : '' }}>{{
                                    $item->nama_kategori }}</option>
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
                                <option value="Tersedia" {{ old('status', $book->status) == 'Tersedia' ?
                                    'selected' : '' }}>
                                    Tersedia</option>
                                <option value="Tidak tersedia" {{ old('status', $book->status) == 'Tidak
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
                            <textarea cols="5" rows="5" class="form-control @error('sinopsis') is-invalid @enderror"
                                name="sinopsis"
                                placeholder="Masukkan sinopsis buku">{{ old('sinopsis', $book->sinopsis) }}</textarea>
                            @error('sinopsis')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if($book->format === 'Elektronik')
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Unggah File E-Book (PDF)</label>
                            <div class="d-flex gap-2">
                                <div>
                                    <input type="file" class="form-control @error('e_book_file') is-invalid @enderror"
                                        accept=".pdf" name="e_book_file" id="e-book-file">

                                    @error('e_book_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if($book->e_book_file)
                                <a href="">
                                    <button type="button" class="btn btn-success">Download</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-primary">Lihat</button>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>

    @if($book->format === 'Fisik')
    <div class="card mt-3">
        <div class="card-body">
            <h2>Biaya Denda Buku</h2>
            <form action="{{ route('update_fine', $book->fine->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Buku Terlambat (Rp)</label>
                            <input type="number" min="0"
                                value="{{ old('denda_terlambat', $book->fine->denda_terlambat ?? 0) }}"
                                class="form-control @error('denda_terlambat') is-invalid @enderror"
                                name="denda_terlambat" placeholder="Masukkan nominal denda terlambat">
                            @error('denda_terlambat')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Buku Rusak (Rp)</label>
                            <input type="number" min="0" value="{{ old('denda_rusak', $book->fine->denda_rusak ?? 0) }}"
                                class="form-control @error('denda_rusak') is-invalid @enderror" name="denda_rusak"
                                placeholder="Masukkan nominal denda rusak">
                            @error('denda_rusak')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Denda Tidak Kembali (Rp)</label>
                            <input type="number" min="0"
                                value="{{ old('denda_tidak_kembali', $book->fine->denda_tidak_kembali ?? 0) }}"
                                class="form-control @error('denda_tidak_kembali') is-invalid @enderror"
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
    @endif
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