document.getElementById('btn-upload').addEventListener('click', () => {
    document.getElementById('upload-cover').click();
});
var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;

$("body").on("change", ".image", function(e) {
    var files = e.target.files;
    var done = function(url) {
        image.src = url;
        $modal.modal('show');
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

$modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
        aspectRatio: 650 / 974,
        viewMode: 3,
        preview: '.preview',
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
    cropper.destroy();
    cropper = null;
});

$("#crop").click(function() {
    var canvas = cropper.getCroppedCanvas({
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

        $modal.modal('hide');
        Swal.fire({
            title: 'Berhasil!',
            text: 'Gambar berhasi di crop dan di unduh',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    });
});



// carousel
// document.getElementById('btn-upload-carousel').addEventListener('click', () => {
//     document.getElementById('upload-carousel').click();
// });
// var $modal = $('#modal-carousel');
// var image = document.getElementById('image-carousel');
// var cropper;

// $("body").on("change", ".image-carousel", function(e) {
//     var files = e.target.files;
//     var done = function(url) {
//         image.src = url;
//         $modal.modal('show');
//     };

//     var reader;
//     var file;

//     if (files && files.length > 0) {
//         file = files[0];

//         if (URL) {
//             done(URL.createObjectURL(file));
//         } else if (FileReader) {
//             reader = new FileReader();
//             reader.onload = function(e) {
//                 done(reader.result);
//             };
//             reader.readAsDataURL(file);
//         }
//     }
// });

// $modal.on('shown.bs.modal-carousel', function() {
//     cropper = new Cropper(image, {
//         aspectRatio: 650 / 974,
//         viewMode: 3,
//         preview: '.preview',
//         autoCropArea: 1,
//         movable: true,
//         scalable: true,
//         zoomable: false,
//         rotatable: false,
//         cropBoxResizable: true,
//         cropBoxMovable: true,
//         dragMode: 'none',
//     });
// }).on('hidden.bs.modal-carousel', function() {
//     cropper.destroy();
//     cropper = null;
// });

// $("#crop-carousel").click(function() {
//     var canvas = cropper.getCroppedCanvas({
//         width: 650,
//         height: 974,
//     });

//     canvas.toBlob(function(blob) {
//         var url = URL.createObjectURL(blob);
//         var link = document.createElement('a');
//         link.href = url;
//         link.download = 'cropped_image.png'; 
//         document.body.appendChild(link);
//         link.click();
//         document.body.removeChild(link);
//         URL.revokeObjectURL(url);

//         $modal.modal('hide');
//         Swal.fire({
//             title: 'Berhasil!',
//             text: 'Gambar berhasi di crop dan di unduh',
//             icon: 'success',
//             confirmButtonText: 'Oke'
//         });
//     });
// });