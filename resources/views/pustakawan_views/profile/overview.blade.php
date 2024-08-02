@extends('layouts.pustakawan_layout')
@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->nama }}</h4>
                                    <h5 class="text-secondary mb-3 h-3">{{ auth()->user()->getRoleNames()->implode(', ') }}
                                    </h5>
                                    <a href="{{ route('logout') }}">
                                        <button class="btn btn-danger">Logout</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Overview Profile</h4>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" placeholder="Masukkan nama lengkap"
                                            value="{{ auth()->user()->nama }}" required>
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NIP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('nip_nis') is-invalid @enderror"
                                            name="nip_nis" placeholder="Masukkan Nomor Induk Pegawai"
                                            value="{{ auth()->user()->nip_nis }}" required>
                                        @error('nip_nis')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No. telepon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" class="form-control @error('telepon') is-invalid @enderror"
                                            name="telepon" placeholder="Masukkan no. telepon"
                                            value="{{ auth()->user()->telepon }}" required>
                                        @error('telepon')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Masukkan email" value="{{ auth()->user()->email }}"
                                            required>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3"
                                            placeholder="Masukkan alamat">{{ auth()->user()->alamat }}</textarea>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button class="btn btn-primary" type="submit">Ubah profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <h4 class="mb-3">Ganti Password</h4>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password saat ini</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" placeholder="Masukkan password saat ini"
                                    required>
                                @error('password')
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
                                <input type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    name="confirm_password" placeholder="Masukkan ulang password" required>
                                @error('confirm_password')
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
@endsection
