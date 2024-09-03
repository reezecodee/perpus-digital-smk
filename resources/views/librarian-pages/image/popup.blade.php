<x-librarian-layout :title="$title" :heading="$heading">
    <x-librarian.alert.import-error />
    <x-librarian.alert.success />
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-bold">Buat Popup</h4>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="" alt="" class="w-75 border preview" id="coverPreview"
                                    style="display: none;">
                            </div>
                            <p id="error-message" style="color: red;"></p>
                            <form action="{{ route('upload_popup') }}" method="post" id="add-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="fileInput">Upload Gambar</label>
                                    <input type="file" id="fileInput" name="image"
                                        class="image @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="error-message" style="display: none; color: red;"></div>
                                </div>
                                <x-librarian.input.basic label="Link redirect" name="link" :value="old('link')"
                                    placeholder="Link redirect (opsional)" type="text" :isrequired="false" />
                                <x-librarian.input.basic label="Urutan ke" name="urutan_ke" :value="old('urutan_ke')"
                                    placeholder="Urutan ke" type="number" :isrequired="true" />
                                <button type="button" onclick="confirmAdd()" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>
                                    Tambahkan</button>
                                <a href="{{ route('crop_picture') }}" target="_blank">
                                    <button class="btn btn-warning" type="button"><i class="fas fa-crop-alt"></i> Crop
                                        gambar</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Link redirect</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($popups as $item)
                                        <tr>
                                            <td align="center">
                                                <img src="{{ asset('storage/img/popup/' . $item->popup_file) }}"
                                                    class="w-75" alt="" srcset="">
                                            </td>
                                            <td>{{ $item->link }}</td>
                                            <td>
                                                <x-librarian.button.delete :id="$item->id" :route="route('delete_popup', $item->id)" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const fileInput = document.getElementById('fileInput');
                    const coverPreview = document.getElementById('coverPreview');
                    const errorMessage = document.getElementById('error-message');

                    fileInput.addEventListener('change', function() {
                        const file = this.files[0];

                        if (file) {
                            if (file.size > 2 * 1024 * 1024) {
                                errorMessage.textContent = 'Ukuran gambar tidak boleh lebih dari 2MB.';
                                errorMessage.style.display = 'block';
                                coverPreview.style.display = 'none';
                                fileInput.value = '';
                                return;
                            }

                            const img = new Image();
                            img.src = URL.createObjectURL(file);

                            img.onload = function() {
                                if (img.width === 507 && img.height === 336) {
                                    errorMessage.style.display = 'none';
                                    coverPreview.src = img.src;
                                    coverPreview.style.display = 'block';
                                } else {
                                    errorMessage.textContent =
                                        'Gambar harus memiliki resolusi 507 x 336 piksel.';
                                    errorMessage.style.display = 'block';
                                    coverPreview.style.display = 'none';
                                    fileInput.value = '';
                                }
                            };

                            img.onerror = function() {
                                errorMessage.textContent = 'Terjadi kesalahan saat memuat gambar.';
                                errorMessage.style.display = 'block';
                                coverPreview.style.display = 'none';
                                fileInput.value = '';
                            };
                        } else {
                            errorMessage.textContent = 'Silakan pilih file gambar.';
                            fileInput.value = '';
                            errorMessage.style.display = 'block';
                            coverPreview.style.display = 'none';
                        }
                    });
                });
            </script>
        </div>
    </div>
</x-librarian-layout>
