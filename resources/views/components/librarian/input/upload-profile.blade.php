<div class="d-flex justify-content-center">
    <div id="cropped_image_result">
        <img class="crop-result" src="{{ asset('storage/img/profile/' . $photo) }}" alt="" width="200"
            style="border-radius: 100px">
    </div>
</div>
<div class="my-3 d-flex justify-content-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-crop"><i
            class="fas fa-upload"></i> Upload Foto
        Profile</button>
</div>