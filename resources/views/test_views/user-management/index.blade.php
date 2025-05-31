<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                        </svg>
                        Print
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">PDF</a></li>
                        <li><a class="dropdown-item">Excel</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-database-import">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                            <path d="M4 6v6c0 1.657 3.582 3 8 3c.856 0 1.68 -.05 2.454 -.144m5.546 -2.856v-6" />
                            <path d="M4 12v6c0 1.657 3.582 3 8 3c.171 0 .341 -.002 .51 -.006" />
                            <path d="M19 22v-6" />
                            <path d="M22 19l-3 -3l-3 3" />
                        </svg>
                        Import Via Excel
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">Import langsung</a></li>
                        <li><a class="dropdown-item">Download format</a></li>
                    </ul>
                </div>
            </div>

            <table id="data-table" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis kelamin</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.user', $roleLowerCase) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'telepon',
                        name: 'telepon'
                    },
                    {
                        data: 'jk',
                        name: 'jk'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false, 
                        searchable: false
                    },
                ]
            });
        });
    </script>

    <form action="" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah {{ $role }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-librarian.input.upload-profile :photo="$data->photo ?? 'unknown.jpg'" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" value="{{ old('username') }}"
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
                                    <input type="text" value="{{ old('nama') }}"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Masukkan nama lengkap">
                                    @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">{{ $role == 'Siswa' ? 'Nomor Induk Siswa (NIS)' :
                                        'Nomor Induk Pegawai (NIP)' }}</label>
                                    <input type="text" value="{{ old('nip_nis') }}"
                                        class="form-control @error('nip_nis') is-invalid @enderror" name="nip_nis"
                                        placeholder="Masukkan {{ $role == 'Siswa' ? 'NIS' : 'NIP' }}">
                                    @error('nip_nis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Telepon</label>
                                    <input type="text" value="{{ old('telepon') }}"
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
                                    <input type="text" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Masukkan email">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">NISN</label>
                                    <input type="text" value="{{ old('nisn') }}"
                                        class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                        placeholder="Masukkan NISN">
                                    @error('nisn')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <select name="jk" class="form-select @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jk')=='Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan" {{ old('jk')=='Perempuan' ? 'selected' : '' }}>
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
                                        <option value="Aktif" {{ old('status')=='Aktif' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="Nonaktif" {{ old('status')=='Nonaktif' ? 'selected' : '' }}>
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
                                    <textarea cols="5" rows="5"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        placeholder="Masukkan alamat perpustakaan">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-librarian.input.cnfrm-checkbox />
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Batalkan
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Tambah {{ $role }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <x-librarian.modal.crop-profile />
    </form>

</x-test-layout>