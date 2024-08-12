@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Username</label>
                                <input type="text" name="username" placeholder="Masukkan username"
                                    value="{{ old('username', $data->username ?? '') }}"
                                    class="form-control @error('username') is-invalid @enderror" required>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Nama lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama', $data->nama ?? '') }}"
                                    placeholder="Masukkan nama" class="form-control @error('nama') is-invalid @enderror"
                                    required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Nomor Induk Pegawai (NIP)</label>
                                <input type="number" name="nip_nis" value="{{ old('nip_nis', $data->nip_nis ?? '') }}"
                                    placeholder="Masukkan NIP" class="form-control @error('nip_nis') is-invalid @enderror"
                                    required>
                                @error('nip_nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Nomor telepon</label>
                                <input type="number" name="telepon" value="{{ old('telepon', $data->telepon ?? '') }}"
                                    placeholder="Masukkan no.telepon"
                                    class="form-control @error('telepon') is-invalid @enderror" required>
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ old('email', $data->email ?? '') }}"
                                    placeholder="Masukkan email" class="form-control @error('email') is-invalid @enderror"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Jenis kelamin</label>
                                <select name="jk" class="form-control"required>
                                    <option value="{{ old('jk', $data->jk ?? '') }}" selected>
                                        {{ old('jk', $data->jk ?? '-- Pilih jenis kelamin --') }}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Password sementara</label>
                                <input type="text" name="password" value="{{ old('password') }}"
                                    placeholder="Masukkan password sementara" class="form-control">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Konfirmasi password</label>
                                <input type="password" name="confirm_password" placeholder="Masukkan konfirmasi password"
                                    class="form-control">
                                @error('confirm_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="">Alamat</label>
                                <textarea name="alamat" rows="5" placeholder="Masukkan alamat" class="form-control">{{ old('alamat', $data->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="">Status akun</label>
                                <select name="status" class="form-control" required>
                                    <option value="{{ old('status', $data->status ?? '') }}" selected>
                                        {{ old('status', $data->status ?? '-- Pilih status akun --') }}</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non-aktif">Nonaktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <p class="text-danger">* Anda tidak dapat lagi mengubah data Admin ini jika statusnya sudah
                                    aktif.</p>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="konfirmasi" value="setuju" class="form-check-input"
                                        id="konfirmasiCheck" style="cursor: pointer" required>
                                    <label class="form-check-label" for="konfirmasiCheck" style="cursor: pointer">Saya yakin data tersebut sudah
                                        benar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <div id="cropped_image_result">
                                <img class="crop-result"
                                    src="{{ asset('storage/img/profile/' . ($data->photo ?? 'unknown.jpg')) }}"
                                    alt="" width="200" style="border-radius: 100px">
                            </div>
                        </div>
                        <div class="my-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-default"><i class="fas fa-upload"></i> Upload foto
                                profile</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Crop Profile</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center gap-5">
                                    <div class="w-full" align="center">
                                        <div id="display_image_div">
                                            <img name="display_image_data" id="display_image_data"
                                                src="/img/dummy-image.png" alt="Picture">
                                        </div>
                                        <input type="hidden" name="cropped_image_data" id="cropped_image_data">
                                        <br>
                                        <input type="file" accept=".jpg, .jpeg, .png" name="browse_image"
                                            id="browse_image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <button type="button" class="btn btn-warning" id="crop_button">Crop</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">Oke</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" onclick="upload()" class="btn btn-primary">Simpan data admin</button>
                </div>
            </form>
        </div>
    </div>
@endsection
