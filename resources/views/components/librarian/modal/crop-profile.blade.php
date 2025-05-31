<div class="modal modal-blur fade" id="modal-crop" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-cropper" role="cropper">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crop Profile</h4>
                <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center gap-5">
                    <div class="w-full" align="center">
                        <div id="display_image_div">
                            <img name="display_image_data" id="display_image_data" src="/img/dummy-image.png"
                                alt="Picture">
                        </div>
                        <input type="hidden" name="image" id="cropped_image_data">
                        <br>
                        <input type="file" accept=".jpg, .jpeg, .png" name="" id="browse_image">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="crop_button"><i
                        class="fas fa-crop-alt"></i> Crop</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("browse_image").addEventListener('change', function() {
            var file = this.files[0];
            var size = file.size;
            if (size > 1048576) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gambar yang di upload terlalu besar, maximal adalah 1MB',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                this.value = "";
            }
        });
</script>