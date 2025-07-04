<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full popup-enter-modal">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Upload foto
                    </h3>
                    <span class="text-red-primary text-sm font-semibold"><i class="fas fa-exclamation-triangle"></i> Jika crop foto tidak muncul, klik tombol
                        Batalkan kemudian upload gambar ulang.</span>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="flex justify-center">
                    <div class="w-80" align="center">
                        <div id="display_image_div">
                            <img name="display_image_data" class="pv" id="display_image_data"
                                src="/img/dummy-image.png" alt="Picture">
                        </div>
                        <input type="hidden" class="input-image" name="image" id="cropped_image_data">
                        <br>
                        <input type="file" class="input-image" name="image" id="browse_image"
                            accept=".png, .jpg, .jpeg">
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button id="crop_button" type="button"
                    class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hvr-shrink"><i
                        class="fas fa-upload"></i> Upload foto</button>
                <button data-modal-hide="static-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-red-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-red-100 hvr-shrink"
                    id="close-btn">Batalkan</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="/js/cropper.js"></script>
