<x-librarian-layout :title="$title" :heading="$heading">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update_app') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Informasi metadata aplikasi</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Nama sekolah" name="nama_sekolah" :value="old('nama_sekolah', $data->nama_sekolah ?? '')"
                                    placeholder="Masukkan nama sekolah" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Keyword" name="keyword" :value="old('keyword', $data->keyword ?? '')"
                                    placeholder="Masukkan kata kunci" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Hak cipta" name="hak_cipta" :value="old('hak_cipta', $data->hak_cipta ?? '')"
                                    placeholder="Hak cipta website" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Website utama sekolah" name="web_sekolah" :value="old('web_sekolah', $data->web_sekolah ?? '')"
                                    placeholder="Website utama sekolah" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-12">
                                <x-librarian.input.textarea label="Deskripsi singkat" name="deskripsi" :value="old('deskripsi', $data->deskripsi ?? '')"
                                    placeholder="Deskripsi singkat" :isrequired="true" />
                            </div>
                            <div class="col-md-12">
                                <x-librarian.input.cnfrm-checkbox />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan data</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Favicon website</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="/assets/app/{{ $data->favicon ?? 'img_not_found.svg' }}" alt="" class="w-25"
                                id="imagePreview">
                        </div>
                        <div class="my-3">
                            <input type="file" accept=".jpg, .png, .jpeg, .ico, .svg" id="imageUpload" name="favicon">
                        </div>
                        @error('favicon')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="error-message"></span>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="/js/data_perpus.js"></script>
</x-librarian-layout>