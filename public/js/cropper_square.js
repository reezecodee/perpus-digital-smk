document.getElementById('uploadBtn').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    // Anda bisa memproses file yang diunggah di sini
    const file = event.target.files[0];
    console.log('File yang dipilih:', file.name);
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
            var url;

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
            canvas = cropper.getCroppedCanvas({
                width: 650,
                height: 974,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "test-crop-kotak",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        });