<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crop Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="crop_button" ><i class="fas fa-crop-alt"></i> Crop</button>
            </div>
        </div>
    </div>
</div>
