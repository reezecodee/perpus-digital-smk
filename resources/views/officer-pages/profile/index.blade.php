<x-officer-layout :title="$title" :pageTitle="$pageTitle" :name="$name">
    <div class="card">
        <div class="card-body">
            <h2>Data Diri</h2>
            <form action="{{ route('profile.update_profile') }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <x-librarian.input.upload-profile :photo="auth()->user()->photo ?? 'unknown.jpg'" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Username</label>
                            <input type="text" value="{{ old('username', auth()->user()->username) }}"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                placeholder="Masukkan username">
                            @error('username')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" value="{{ old('nama', auth()->user()->nama) }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jabatan</label>
                            <input type="text" value="{{ auth()->user()->getRoleNames()->first() }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nomor Induk Pegawai (NIP)</label>
                            <input type="text" value="{{ auth()->user()->nip_nis }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" value="{{ old('telepon', auth()->user()->telepon) }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="email" value="{{ old('email', auth()->user()->email) }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <input type="text" value="{{ auth()->user()->jk }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <textarea cols="5" rows="5" class="form-control" readonly disabled>{{ old('alamat', auth()->user()->alamat) }}</textarea>
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
                <x-librarian.modal.crop-profile />
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h2>Ganti Password</h2>
            <form action="{{ route('profile.update_pw_petugas') }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Password Saat Ini</label>
                            <input type="text" class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" placeholder="Masukkan password saat ini">
                            @error('current_password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                name="new_password" placeholder="Masukkan password baru">
                            @error('new_password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                name="new_password_confirmation" placeholder="Masukkan konfirmasi password">
                            @error('new_password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button class="btn btn-primary">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</x-officer-layout>