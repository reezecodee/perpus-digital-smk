<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name">
    <div class="card mb-2">
        <div class="card-body">
            <h2>Pengaturan Aplikasi</h2>
            <form action="{{ route('setting.update') }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror"
                                name="nama_sekolah" placeholder="Masukkan nama sekolah">
                            @error('nama_sekolah')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama Perpustakaan</label>
                            <input type="text" class="form-control @error('nama_perpustakaan') is-invalid @enderror"
                                name="nama_perpustakaan" placeholder="Masukkan nama perpustakaan">
                            @error('nama_perpustakaan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Masukkan email perpustakaan">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                name="telepon" placeholder="Masukkan telepon perpustakaan">
                            @error('telepon')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Keyword</label>
                            <input type="text" class="form-control @error('keyword') is-invalid @enderror"
                                name="keyword" placeholder="Masukkan keyword perpustakaan">
                            @error('keyword')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror"
                                name="website" placeholder="Masukkan website perpustakaan">
                            @error('website')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jam Buka</label>
                            <input type="time" class="form-control @error('jam_buka') is-invalid @enderror"
                                name="jam_buka" placeholder="Masukkan jam buka perpustakaan">
                            @error('jam_buka')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Jam Tutup</label>
                            <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror"
                                name="jam_tutup" placeholder="Masukkan jam tutup perpustakaan">
                            @error('jam_tutup')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Hari Libur</label>
                            <input type="text" class="form-control @error('hari_libur') is-invalid @enderror"
                                name="hari_libur" placeholder="Masukkan hari libur perpustakaan">
                            @error('hari_libur')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                                name="deskripsi" placeholder="Masukkan deskripsi perpustakaan"></textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <textarea cols="5" rows="5" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" placeholder="Masukkan alamat perpustakaan"></textarea>
                            @error('alamat')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Favicon</label>
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/app/{{ $data->favicon ?? 'img_not_found.svg' }}" class="w-25"
                                        id="preview-favicon">
                                </div>
                                <div class="my-3">
                                    <input type="file" accept="image/*" id="upload-favicon" name="favicon"
                                        data-preview="preview-favicon">
                                </div>
                                @error('favicon')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Logo Sekolah</label>
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/app/{{ $data->logo_sekolah ?? 'img_not_found.svg' }}" class="w-25"
                                        id="preview-logo_sekolah">
                                </div>
                                <div class="my-3">
                                    <input type="file" accept="image/*" id="upload-logo_sekolah" name="logo_sekolah"
                                        data-preview="preview-logo_sekolah">
                                </div>
                                @error('logo_sekolah')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Logo Perpustakaan</label>
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/app/{{ $data->logo_perpus ?? 'img_not_found.svg' }}" class="w-25"
                                        id="preview-logo_perpus">
                                </div>
                                <div class="my-3">
                                    <input type="file" accept="image/*" id="upload-logo_perpus" name="logo_perpus"
                                        data-preview="preview-logo_perpus">
                                </div>
                                @error('logo_perpus')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">QRIS Perpustakaan</label>
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/app/{{ $data->qris_perpus ?? 'img_not_found.svg' }}" class="w-25"
                                        id="preview-qris_perpus">
                                </div>
                                <div class="my-3">
                                    <input type="file" accept="image/*" id="upload-qris_perpus" name="qris_perpus"
                                        data-preview="preview-qris_perpus">
                                </div>
                                @error('qris_perpus')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Carousel Perpus</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-report">Tambah
                    Carousel</button>
            </div>
            <table id="data-table" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Carousel</th>
                        <th>Urutan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <form action="{{ route('setting.storeCarousel') }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Carousel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img id="preview-carousel" src="/img/unknown_carousel.png"
                                style="width: 100%; max-width: 700px; height: auto; aspect-ratio: 1216 / 304; object-fit: contain; border: 1px solid #ccc;" />
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <input type="file" name="carousel_file" id="fileInput" accept=".jpg, .jpeg, .png"
                                style="display: none">
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('fileInput').click()">Upload
                                Carousel</button>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Urutan</label>
                                    <input type="number" value="{{ old('urutan') }}"
                                        class="form-control @error('urutan') is-invalid @enderror" name="urutan"
                                        placeholder="Masukkan urutan carousel">
                                    @error('urutan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-librarian.input.cnfrm-checkbox :identity="'checkbox-carousel'"/>
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
                            Tambah Carousel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.carousel') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'carousel',
                        name: 'carousel'
                    },
                    {
                        data: 'urutan',
                        name: 'urutan'
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

    <script>
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview-carousel');

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
            preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '/img/unknown_cover.png';
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files[0];
            const previewId = this.dataset.preview;
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
    </script>

</x-test-layout>