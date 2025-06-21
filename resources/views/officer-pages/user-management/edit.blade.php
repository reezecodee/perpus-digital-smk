<x-officer-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <form action="{{ route('update_user', $user->id) }}" enctype="multipart/form-data" method="post" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <x-librarian.input.upload-profile :photo="$user->photo ?? 'unknown.jpg'" />

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Username</label>
                            <input type="text" value="{{ old('username', $user->username) }}"
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
                            <input type="text" value="{{ old('nama', $user->nama) }}"
                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                placeholder="Masukkan nama lengkap">
                            @error('nama')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">{{ $user->hasRole('Siswa') ? 'Nomor Induk Siswa (NIS)' :
                                'Nomor Induk Pegawai (NIP)' }}</label>
                            <input type="text" value="{{ old('nip_nis', $user->nip_nis) }}"
                                class="form-control @error('nip_nis') is-invalid @enderror" name="nip_nis" placeholder="Masukkan {{ $user->hasRole('Siswa') ? 'NIS' :
                                'NIP' }}">
                            @error('nip_nis')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" value="{{ old('telepon', $user->telepon) }}"
                                class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                placeholder="Masukkan telepon">
                            @error('telepon')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="email" value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Masukkan email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if($role == 'Siswa')
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">NISN</label>
                            <input type="text" value="{{ old('nisn', $user->nisn) }}"
                                class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                placeholder="Masukkan NISN">
                            @error('nisn')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-select @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jk', $user->jk) =='Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('jk', $user->jk) =='Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jk')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Status Akun</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="Aktif" {{ old('status', $user->status) == 'Aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="Nonaktif" {{ old('status', $user->status) == 'Nonaktif' ? 'selected' : ''
                                    }}>
                                    Nonaktif</option>
                            </select>
                            @error('jk')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <textarea cols="5" rows="5" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat"
                                placeholder="Masukkan alamat perpustakaan">{{ old('alamat', $user->alamat) }}</textarea>
                            @error('alamat')
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
        <x-librarian.modal.crop-profile />
    </form>
</x-officer-layout>