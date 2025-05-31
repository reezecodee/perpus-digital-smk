<!DOCTYPE html>
<html>

<head>
    <title>Crop Picture Editor</title>
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
    <input type="file" name="image" class="image d-none" id="upload-carousel">
    <div class="container">
        <div class="d-flex flex-col justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <h1 class="text-light fw-bold">Crop or Resize Picture</h1>
                <p class="mb-5 text-white">Refresh halaman ini jika button crop tidak berfungsi.</p>
                <button class="btn btn-success mr-2" id="btn-upload-cover"><i class="fas fa-upload"></i> Crop cover buku</button>
                <button class="btn btn-primary mr-2" id="btn-upload-carousel"><i class="fas fa-upload"></i> Crop carousel</button>
                <a href="https://imageresizer.com/" target="_blank">
                    <button class="btn btn-warning"><i class="fas fa-compress-arrows-alt"></i> Resize
                        size
                        file</button>
                </a>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modal-cover" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Resolusi: 650 x 974
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image-cover" src="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-primary" id="crop-cover">Crop & download</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-carousel" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Resolusi: 1216 x 304
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image-carousel" src="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-primary" id="crop-carousel">Crop & download</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/cropper_group.js"></script>
</body>

</html>
