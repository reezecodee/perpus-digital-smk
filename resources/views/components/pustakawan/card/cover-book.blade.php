<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="">Cover buku</label>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/img/cover/' . ($coverbuku ?? 'unknown_cover.png')) }}" alt=""
                    class="w-75 border preview" id="coverPreview">
            </div>
            <p class="text-center" id="file-name-cover"></p>
            <div class="d-flex justify-content-center w-full">
                <input type="file" id="fileInputCover" name="cover_buku" class="image" style="display: none"
                    accept=".jpg, .png, .jpeg">
                <button class="btn btn-success mr-2" type="button" id="uploadCoverBtn"><i class="fas fa-upload"></i>
                    Upload cover</button>
                <a href="{{ route('crop-picture') }}" target="_blank">
                    <button class="btn btn-warning" type="button"><i class="fas fa-crop-alt"></i> Crop
                        gambar</button>
                </a>
            </div>
            @error('cover_buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="error-message" style="display: none; color: red;"></div>
        </div>
    </div>
</div>
