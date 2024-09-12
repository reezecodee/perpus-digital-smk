// Pastikan dokumen sudah siap sebelum menjalankan script
$(document).ready(function() {
    let closeBtn = document.getElementById('close-btn');
    let cropButton = document.getElementById('crop_button');
    let browseImage = document.getElementById('browse_image');
    let displayImageDiv = document.getElementById('display_image_div');
    let cropper;
    let maxSize = 2 * 1024 * 1024; // 2MB dalam byte
    let isUploading = false; // Menandakan status upload

    closeBtn.addEventListener('click', resetUpload);
    browseImage.addEventListener('change', handleImageSelect);
    cropButton.addEventListener('click', cropImage);

    function resetUpload() {
        displayImageDiv.innerHTML = '<img name="display_image_data" class="pv" id="display_image_data" src="/img/dummy-image.png" alt="Picture">';
        browseImage.value = '';
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    }

    function handleImageSelect(e) {
        let files = e.target.files;
        if (files.length === 0) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Harap pilih file sebelum melanjutkan.',
                icon: 'warning',
                confirmButtonText: 'Oke'
            });
            return;
        }

        let file = files[0];
        if (file.size > maxSize) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Ukuran file tidak boleh lebih dari 2MB.',
                icon: 'warning',
                confirmButtonText: 'Oke'
            });
            browseImage.value = '';
            return;
        }

        let reader = new FileReader();
        reader.onload = function(e) {
            displayImageDiv.innerHTML = '<img name="display_image_data" id="display_image_data" src="' + e.target.result + '" alt="Uploaded Picture">';
            initializeCropper();
        };
        reader.readAsDataURL(file);
    }

    function initializeCropper() {
        let image = document.getElementById('display_image_data');
        if (cropper) {
            cropper.destroy();
        }
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
            ready: function() {
                // Cropper is ready
            },
        });
    }

    function cropImage() {
        if (!cropper) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Harap unggah gambar terlebih dahulu sebelum melakukan crop.',
                icon: 'warning',
                confirmButtonText: 'Oke'
            });
            return;
        }

        if (isUploading) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Gambar sedang diunggah, harap tunggu.',
                icon: 'warning',
                confirmButtonText: 'Oke'
            });
            return;
        }

        let croppedCanvas = cropper.getCroppedCanvas();
        let roundedCanvas = getRoundedCanvas(croppedCanvas);
        let roundedImage = document.createElement('img');
        roundedImage.src = roundedCanvas.toDataURL();
        upload(roundedCanvas.toDataURL());
    }

    function getRoundedCanvas(sourceCanvas) {
        let canvas = document.createElement('canvas');
        let context = canvas.getContext('2d');
        let width = sourceCanvas.width;
        let height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
        context.fill();
        return canvas;
    }

    function upload(base64data) {
        showLoader();
        isUploading = true; // Menandakan proses upload dimulai
        cropButton.disabled = true; // Menonaktifkan tombol crop
        closeBtn.disabled = true; // Menonaktifkan tombol close jika perlu
        browseImage.disabled = true; // Menonaktifkan tombol browse jika perlu
        // cropButton.style.cursor = disabled ? 'not-allowed' : 'pointer';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: $('meta[name="url"]').attr('content'),
            data: {
                '_token': $('meta[name="_token"]').attr('content'),
                'image': base64data
            },
            success: function(data) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Gambar berhasil di upload, Klik Oke untuk merefresh halaman.',
                    icon: 'success',
                    confirmButtonText: 'Oke',
                    allowOutsideClick: false,  // Menonaktifkan klik di luar area dialog
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        hideLoader();
                        window.location.href = $('meta[name="url"]').attr('content');
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Upload gagal!',
                    text: xhr.responseJSON.message,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
                hideLoader();
            },
            complete: function() {
                isUploading = false;
                cropButton.disabled = false;
                closeBtn.disabled = false;
                browseImage.disabled = false;
                hideLoader();
            }
        });
    }
});
