<x-librarian-layout :title="$title" :heading="$heading">
    <form id="update-form" action="{{ route('update_article', $data->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('storage/img/thumbnail/' . ($data->thumbnail ?? 'unknown_cover.png')) }}" alt="" class="w-75 border preview" id="imagePreview"
                            >
                    </div>
                    <div class="d-flex justify-content-center w-full">
                        <input type="file" id="fileInput" name="thumbnail" class="image" style="display: none;" value="{{ $data->thumbnail }}">
                        <button class="btn btn-primary" type="button" id="uploadBtn"><i class="fas fa-upload"></i> Upload
                            cover artikel</button>
                    </div>
                    <div id="error-message" style="display: none; color: red;"></div>
                    @error('thumbnail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <x-librarian.input.basic label="Judul" name="judul" :value="old('judul', $data->judul)"
                            placeholder="Judul artikel" type="text" :isrequired="true" />
                    </div>
                    <div class="col-md-4">
                        <x-librarian.input.basic label="Keyword" name="keyword" :value="old('keyword', $data->keyword)" placeholder="Kata kunci"
                            type="text" :isrequired="true" />
                    </div>
                    <div class="col-md-4">
                        <x-librarian.input.select label="Pilih visibilitas" name="visibilitas" :options="['Publik', 'Privasi']" :selectedvalue="$data->visibilitas"
                            :isrequired="true" />
                    </div>
                    <div class="col-md-12">
                        <x-librarian.input.textarea label="Deskripsi" name="deskripsi" :value="old('deskripsi', $data->deskripsi)" placeholder="Deskripsi artikel"
                            :isrequired="true" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <x-librarian.input.froala name="konten_artikel" :value="old('konten_artikel', $data->konten_artikel)" />
                <button class="btn btn-primary mt-3" type="button" onclick="confirmUpdate()">Edit artikel</button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadBtn = document.getElementById('uploadBtn');
            const fileInput = document.getElementById('fileInput');
            const imagePreview = document.getElementById('imagePreview');
            const errorMessage = document.getElementById('error-message');

            uploadBtn.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    if (file.size > 2 * 1024 * 1024) {
                        errorMessage.textContent = 'Ukuran file tidak boleh lebih dari 2MB.';
                        errorMessage.style.display = 'block';
                        imagePreview.style.display = 'none';
                        return;
                    }

                    const img = new Image();
                    img.src = URL.createObjectURL(file);
                    img.onload = function() {
                        const width = img.width;
                        const height = img.height;
                        const aspectRatio = width / height;

                        // Validasi rasio aspek
                        if (Math.abs(aspectRatio - 16 / 9) > 0.01) {
                            errorMessage.textContent = 'Gambar harus memiliki rasio aspek 16:9.';
                            errorMessage.style.display = 'block';
                            imagePreview.style.display = 'none';
                        } else {
                            errorMessage.style.display = 'none';
                            imagePreview.src = img.src;
                            imagePreview.style.display = 'block';
                        }
                    };
                } else {
                    errorMessage.textContent = 'Silakan pilih file gambar.';
                    errorMessage.style.display = 'block';
                    imagePreview.style.display = 'none';
                }
            });
        });
    </script>
</x-librarian-layout>
