@extends('layouts.pustakawan_layout')
@section('content')
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
                                <div class="form-group">
                                    <label for="">Nama sekolah</label>
                                    <input type="text" name="nama_sekolah"
                                        class="form-control @error('nama_sekolah') is-invalid @enderror"
                                        placeholder="Nama sekolah"
                                        value="{{ old('nama_sekolah', $data->nama_sekolah ?? '') }}" autocomplete="off"
                                        required>
                                    @error('nama_sekolah')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Keyword</label>
                                    <input type="text" name="keyword"
                                        class="form-control @error('keyword') is-invalid @enderror"
                                        placeholder="Keyword website" value="{{ old('keyword', $data->keyword ?? '') }}"
                                        autocomplete="off" required>
                                    @error('keyword')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Hak cipta</label>
                                    <input type="text" name="hak_cipta"
                                        class="form-control @error('hak_cipta') is-invalid @enderror"
                                        placeholder="Hak cipta website"
                                        value="{{ old('hak_cipta', $data->hak_cipta ?? '') }}" autocomplete="off" required>
                                    @error('hak_cipta')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Website utama sekolah</label>
                                    <input type="text" name="web_sekolah"
                                        class="form-control @error('web_sekolah') is-invalid @enderror"
                                        placeholder="Website utama sekolah"
                                        value="{{ old('web_sekolah', $data->web_sekolah ?? '') }}" autocomplete="off"
                                        required>
                                    @error('web_sekolah')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi singkat</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3"
                                        placeholder="Deskripsi singkat" autocomplete="off" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="konfirmasi" value="setuju" class="form-check-input"
                                        id="konfirmasiCheck" required>
                                    <label class="form-check-label" for="konfirmasiCheck">Saya yakin data tersebut sudah
                                        benar</label>
                                </div>
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
                            <img src="/assets/app/{{ $data->favicon ?? 'img_not_found.svg' }}" alt=""
                                class="w-25" id="imagePreview">
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
@endsection
