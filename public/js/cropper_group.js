// Untuk modal cover
document.getElementById('btn-upload-cover').addEventListener('click', () => {
    document.getElementById('upload-cover').click();
});

var $modalCover = $('#modal-cover');
var imageCover = document.getElementById('image-cover');
var cropperCover;

document.getElementById('upload-cover').addEventListener('change', function(e) {
    var files = e.target.files;
    var done = function(url) {
        imageCover.src = url;
        $modalCover.modal('show');
    };

    var reader;
    var file;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modalCover.on('shown.bs.modal', function() {
    cropperCover = new Cropper(imageCover, {
        aspectRatio: 650 / 974,
        viewMode: 3,
        preview: '.preview-cover',
        autoCropArea: 1,
        movable: true,
        scalable: true,
        zoomable: false,
        rotatable: false,
        cropBoxResizable: true,
        cropBoxMovable: true,
        dragMode: 'none',
    });
}).on('hidden.bs.modal', function() {
    cropperCover.destroy();
    cropperCover = null;
});

$("#crop-cover").click(function() {
    var canvas = cropperCover.getCroppedCanvas({
        width: 650,
        height: 974,
    });

    canvas.toBlob(function(blob) {
        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');
        link.href = url;
        link.download = 'cropped_cover.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        $modalCover.modal('hide');
        Swal.fire({
            title: 'Berhasil!',
            text: 'Gambar berhasil di-crop dan diunduh',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    });
});

// Untuk modal carousel
document.getElementById('btn-upload-carousel').addEventListener('click', () => {
    document.getElementById('upload-carousel').click();
});

var $modalCarousel = $('#modal-carousel');
var imageCarousel = document.getElementById('image-carousel');
var cropperCarousel;

document.getElementById('upload-carousel').addEventListener('change', function(e) {
    var files = e.target.files;
    var done = function(url) {
        imageCarousel.src = url;
        $modalCarousel.modal('show');
    };

    var reader;
    var file;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modalCarousel.on('shown.bs.modal', function() {
    cropperCarousel = new Cropper(imageCarousel, {
        aspectRatio: 1216 / 304,
        viewMode: 3,
        preview: '.preview-carousel',
        autoCropArea: 1,
        movable: true,
        scalable: true,
        zoomable: false,
        rotatable: false,
        cropBoxResizable: true,
        cropBoxMovable: true,
        dragMode: 'none',
    });
}).on('hidden.bs.modal', function() {
    cropperCarousel.destroy();
    cropperCarousel = null;
});

$("#crop-carousel").click(function() {
    var canvas = cropperCarousel.getCroppedCanvas({
        width: 1216,
        height: 304,
    });

    canvas.toBlob(function(blob) {
        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');
        link.href = url;
        link.download = 'cropped_carousel.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        $modalCarousel.modal('hide');
        Swal.fire({
            title: 'Berhasil!',
            text: 'Gambar berhasil di-crop dan diunduh',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    });
});


document.getElementById('btn-upload-popup').addEventListener('click', () => {
    document.getElementById('upload-popup').click();
});

var $modalPopup = $('#modal-popup');
var imagePopup = document.getElementById('image-popup');
var cropperPopup;

document.getElementById('upload-popup').addEventListener('change', function(e) {
    var files = e.target.files;
    var done = function(url) {
        imagePopup.src = url;
        $modalPopup.modal('show');
    };

    var reader;
    var file;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modalPopup.on('shown.bs.modal', function() {
    cropperPopup = new Cropper(imagePopup, {
        aspectRatio: 507 / 336,
        viewMode: 3,
        preview: '.preview-popup',
        autoCropArea: 1,
        movable: true,
        scalable: true,
        zoomable: false,
        rotatable: false,
        cropBoxResizable: true,
        cropBoxMovable: true,
        dragMode: 'none',
    });
}).on('hidden.bs.modal', function() {
    cropperPopup.destroy();
    cropperPopup = null;
});

$("#crop-popup").click(function() {
    var canvas = cropperPopup.getCroppedCanvas({
        width: 507,
        height: 336,
    });

    canvas.toBlob(function(blob) {
        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');
        link.href = url;
        link.download = 'cropped_popup.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        $modalPopup.modal('hide');
        Swal.fire({
            title: 'Berhasil!',
            text: 'Gambar berhasil di-crop dan diunduh',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    });
});
