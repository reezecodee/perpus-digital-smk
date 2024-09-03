<x-librarian-layout :title="$title" :heading="$heading">
    @if (isset($data))
        <form action="{{ route('update_book', ['format' => $format, 'id' => $data->id]) }}" method="post"
            enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="{{ route('store_book', $format) }}" method="post" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <x-librarian.input.basic label="Judul buku" name="judul" :value="old('judul', $data->judul ?? '')"
                                placeholder="Masukkan judul buku" type="text" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="Author buku" name="author" :value="old('author', $data->author ?? '')"
                                placeholder="Masukkan nama author" type="text" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="Penerbit buku" name="penerbit" :value="old('penerbit', $data->penerbit ?? '')"
                                placeholder="Masukkan penerbit buku" type="text" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="ISBN" name="isbn" :value="old('isbn', $data->isbn ?? '')"
                                placeholder="Masukkan isbn buku" type="text" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="Jumlah halaman" name="jml_halaman" :value="old('jml_halaman', $data->jml_halaman ?? '')"
                                placeholder="Masukkan jumlah halaman buku" type="number" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.select-cb label="Kategori" name="kategori_id"
                                placeholder="Pilih kategori buku" :selectedvalue="$data->kategori_id ?? ''" :options="$categories"
                                :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="Tanggal terbit" name="tgl_terbit" :value="old('tgl_terbit', $data->tgl_terbit ?? '')"
                                type="date" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.basic label="Bahasa buku" name="bahasa" :value="old('bahasa', $data->bahasa ?? '')"
                                placeholder="Masukkan bahasa buku" type="text" :isrequired="true" />
                        </div>
                        <div class="col-md-6">
                            <x-librarian.input.select label="Status buku" name="status" :options="['Tersedia', 'Tidak tersedia']"
                                placeholader="Pilih kategori buku" :selectedvalue="$data->status ?? ''" :isrequired="true" />
                        </div>
                        <div class="col-md-12">
                            <x-librarian.input.textarea label="Sinopsis/Deskripsi buku" name="sinopsis" :value="old('sinopsis', $data->sinopsis ?? '')"
                                placeholder="Masukkan sinopsis/deskripsi buku" :isrequired="true" />
                        </div>
                        <input type="hidden" name="format" id="" value="{{ ucfirst($format) }}">
                    </div>
                    @if ($format == 'elektronik')
                        <div class="col-md-12 mb-3">
                            <x-librarian.input.cnfrm-checkbox />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan buku</button>
                        <a href="">
                            <button type="button" class="btn btn-warning">Refresh</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <x-librarian.card.cover-book :coverbuku="$data->cover_buku ?? 'unknown_cover.png'" />
            </div>
            @if ($format == 'elektronik')
                <div class="row">
                    <x-librarian.card.pdf-book :id="$data->id ?? null" :ebookfile="$data->e_book_file ?? null" />
                </div>
            @endif
        </div>
    </div>
    @if ($format == 'fisik')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <x-librarian.input.basic label="Denda buku terlambat" name="denda_terlambat" :value="old('denda_terlambat', $data->fine->denda_terlambat ?? '')"
                            placeholder="Masukkan nominal denda buku terlambat" type="number" :isrequired="true" />
                    </div>
                    <div class="col-md-4">
                        <x-librarian.input.basic label="Denda buku rusak" name="denda_rusak" :value="old('denda_rusak', $data->fine->denda_rusak ?? '')"
                            placeholder="Masukkan nominal denda buku rusak" type="number" :isrequired="true" />
                    </div>
                    <div class="col-md-4">
                        <x-librarian.input.basic label="Denda buku tidak kembali" name="denda_tidak_kembali"
                            :value="old('denda_tidak_kembali', $data->fine->denda_tidak_kembali ?? '')" placeholder="Masukkan nominal denda buku tidak kembali" type="number"
                            :isrequired="true" />
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <x-librarian.input.cnfrm-checkbox />
                </div>
                <button type="submit" class="btn btn-primary">Simpan buku</button>
                <a href="">
                    <button type="button" class="btn btn-warning">Refresh</button>
                </a>
            </div>
        </div>
    @endif
    </form>
    <script src="/js/upload_book.js"></script>
</x-librarian-layout>
