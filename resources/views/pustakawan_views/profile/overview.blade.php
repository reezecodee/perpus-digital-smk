@extends('layouts.pustakawan-layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="main-body">
            <form action="{{ route('update_user', auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Foto Anda</h4>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <x-pustakawan.input.upload-profile :photo="auth()->user()->photo ?? 'unknown.jpg'" />
                                    </div>
                                </div>
                            </div>
                            <x-pustakawan.modal.crop-profile />
                        </div>
                    </div>
                    <div class="col-lg-7">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Overview Profile</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic label="Username" name="username" :value="old('username', auth()->user()->username)"
                                            placeholder="Masukkan username" type="text" :isrequired="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic label="Nama lengkap" name="nama" :value="old('nama', auth()->user()->nama)"
                                            placeholder="Masukkan nama lengkap" type="text" :isrequired="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic-disable label="Jabatan" name="jabatan"
                                            :value="auth()->user()->getRoleNames()->implode(', ')" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic label="Nomor Induk Pegawai" name="nip_nis"
                                            :value="old('nip_nis', auth()->user()->nip_nis)" placeholder="Masukkan Nomor Induk Pegawai" type="number"
                                            :isrequired="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic label="Nomor telepon" name="telepon" :value="old('telepon', auth()->user()->telepon)"
                                            placeholder="Masukkan nomor telepon" type="number" :isrequired="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.basic label="Email" name="email" :value="old('email', auth()->user()->email)"
                                            placeholder="Masukkan email" type="email" :isrequired="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.select label="Jenis kelamin" name="jk" :options="['Laki-laki', 'Perempuan']"
                                            :selectedvalue="auth()->user()->jk ?? ''" :isrequired="true" placeholder="Pilih jenis kelamin" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-pustakawan.input.textarea label="Alamat" name="alamat" :value="old('alamat', auth()->user()->alamat)"
                                            placeholder="Masukkan alamat" :isrequired="true" />
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{ auth()->user()->status }}">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <button class="btn btn-primary" type="submit">Ubah profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update_pw_pustakawan') }}" method="post">
                        @csrf
                        <h4 class="mb-3">Ganti Password</h4>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password saat ini</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" value="{{ old('current_password') }}" placeholder="Masukkan password saat ini" autocomplete="off"
                                    required>
                                @error('current_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password baru</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password" placeholder="Masukkan Password Baru" required>
                                @error('new_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Konfirmasi password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                    name="new_password_confirmation" placeholder="Masukkan ulang password" required>
                                @error('new_password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button class="btn btn-primary" type="submit">Ubah password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("browse_image").addEventListener('change', function() {
            var file = this.files[0];
            var size = file.size;
            if (size > 1048576) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gambar yang di upload terlalu besar, maximal adalah 1MB',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                this.value = "";
            }
        });
    </script>
@endsection
