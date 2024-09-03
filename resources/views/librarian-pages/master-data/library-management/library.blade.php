<x-librarian-layout :title="$title" :heading="$heading">
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
                                <x-librarian.input.basic label="Nama perpustakaan" name="nama_perpustakaan"
                                    :value="old('nama_perpustakaan', $data->nama_perpustakaan ?? '')" placeholder="Nama perpustakaan" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Telepon" name="nama_perpustakaan" :value="old('telepon', $data->telepon ?? '')"
                                    placeholder="Telepon perpustakaan" type="number" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Email" name="email" :value="old('email', $data->email ?? '')"
                                    placeholder="Email perpustakaan" type="email" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Jam operasional buka" name="operasional_buka"
                                    :value="old('operasional_buka', $data->operasional_buka ?? '')" placeholder="Jam operasional buka" type="time" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Jam operasional tutup" name="operasional_tutup"
                                    :value="old('operasional_tutup', $data->operasional_tutup ?? '')" placeholder="Jam operasional tutup" type="time"
                                    :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Website" name="website" :value="old('website', $data->website ?? '')"
                                    placeholder="Website perpustakaan" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Instagram" name="instagram" :value="old('instagram', $data->instagram ?? '')"
                                    placeholder="Link instagram" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Facebook" name="facebook" :value="old('facebook', $data->facebook ?? '')"
                                    placeholder="Link facebook" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-6">
                                <x-librarian.input.basic label="Twitter/X" name="twitter_x" :value="old('twitter_x', $data->twitter_x ?? '')"
                                    placeholder="Link twitter x" type="text" :isrequired="true" />
                            </div>
                            <div class="col-md-12">
                                <x-librarian.input.textarea label="Alamat" name="alamat" :value="old('alamat', $data->alamat ?? '')"
                                    placeholder="Alamat perpustakaan" :isrequired="true" />
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
                        <h4>Logo perpustakaan</h4>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <img src="/assets/app/{{ $data->logo ?? 'img_not_found.svg' }}" alt="" class="w-25"
                                id="imagePreview">
                        </div>
                        <div class="my-3">
                            <input type="file" accept=".jpg, .png, .jpeg, .svg" id="imageUpload" name="logo">
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
</x-librarian-layout>
