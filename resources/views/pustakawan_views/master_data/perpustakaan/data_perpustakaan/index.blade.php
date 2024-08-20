@extends('layouts.pustakawan_layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update_perpus') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Informasi perpustakaan</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama perpustakaan</label>
                                    <input type="text" name="nama_perpustakaan"
                                        class="form-control @error('nama_perpustakaan') is-invalid @enderror"
                                        placeholder="Nama perpustakaan"
                                        value="{{ old('nama_perpustakaan', $data->nama_perpustakaan ?? '') }}"
                                        autocomplete="off" required>
                                    @error('nama_perpustakaan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No. telepon</label>
                                    <input type="number" name="telepon"
                                        class="form-control  @error('telepon') is-invalid @enderror"
                                        placeholder="Telepon perpustakaan"
                                        value="{{ old('telepon', $data->telepon ?? '') }}" autocomplete="off" required>
                                    @error('telepon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email perpustakaan" value="{{ old('email', $data->email ?? '') }}"
                                        autocomplete="off" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam oprasional buka</label>
                                    <input type="time" name="operasional_buka"
                                        class="form-control @error('operasional_buka') is-invalid @enderror"
                                        placeholder="Jam operasional buka"
                                        value="{{ old('operasional_buka', $data->operasional_buka ?? '') }}" required>
                                    @error('operasional_buka')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam oprasional tutup</label>
                                    <input type="time" name="operasional_tutup"
                                        class="form-control @error('operasional_tutup') is-invalid @enderror"
                                        placeholder="Jam operasional tutup"
                                        value="{{ old('operasional_tutup', $data->operasional_tutup ?? '') }}" required>
                                    @error('operasional_tutup')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" name="website"
                                        class="form-control @error('website') is-invalid @enderror"
                                        placeholder="Website perpustakaan"
                                        value="{{ old('website', $data->website ?? '') }}" autocomplete="off" required>
                                    @error('website')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        placeholder="Link instagram" value="{{ old('instagram', $data->instagram ?? '') }}"
                                        autocomplete="off" required>
                                    @error('instagram')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        placeholder="Link facebook" value="{{ old('facebook', $data->facebook ?? '') }}"
                                        autocomplete="off" required>
                                    @error('facebook')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Twitter/X</label>
                                    <input type="text" name="twitter_x"
                                        class="form-control @error('twitter_x') is-invalid @enderror"
                                        placeholder="Link twitter x" value="{{ old('twitter_x', $data->twitter_x ?? '') }}"
                                        autocomplete="off" required>
                                    @error('twitter_x')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3"
                                        placeholder="Alamat perpustakaan" autocomplete="off" required>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                                    @error('alamat')
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
                        <h4>Logo perpustakaan</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="/assets/app/{{ $data->logo ?? 'img_not_found.svg' }}" alt=""
                                class="w-25" id="imagePreview">
                        </div>
                        <div class="my-3">
                            <input type="file" accept=".jpg, .png, .jpeg, .svg" id="imageUpload"
                                name="logo">
                        </div>
                        @error('logo')
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
