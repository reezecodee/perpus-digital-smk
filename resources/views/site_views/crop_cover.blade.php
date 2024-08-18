<!DOCTYPE html>
<html>

<head>
    <title>Crop Cover Buku</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
<style type="text/css">
    h2 {
        font-weight: bold;
        font-size: 20px;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .section {
        margin-top: 150px;
        background: #fff;
        padding: 50px 30px;
    }

    .modal-lg {
        max-width: 500px !important;
    }
</style>

<body class="bg-dark">
    <input type="file" name="image" class="image d-none" id="upload-cover">
    <div class="container">
        <div class="d-flex flex-col justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <h1 class="text-light fw-bold mb-5">Crop or Resize Book Cover</h1>
                <button class="btn btn-success mr-2" id="btn-upload"><i class="fas fa-upload"></i> Upload cover
                    buku</button>
                <a href="https://imageresizer.com/" target="_blank">
                    <button class="btn btn-warning" id="btn-upload"><i class="fas fa-compress-arrows-alt"></i> Resize
                        size
                        file</button>
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image" src="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop & download</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
                link.download = 'cropped_image.png'; 
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
    </script>
</body>

</html>
