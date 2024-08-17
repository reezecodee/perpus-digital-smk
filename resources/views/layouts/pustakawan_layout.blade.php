<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ request()->path() }}">
    @if (session('success'))
        <meta name="flash-message-success" content="{{ session('success') }}">
    @endif
    @if (session('error'))
        <meta name="flash-message-error" content="{{ session('error') }}">
    @endif

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- CDN Icon -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- CSS Template -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Customized CSS -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/cropper.css">
    <!-- CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.7/css/froala_editor.pkgd.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('partials.pustakawan.navbar')

        @include('partials.pustakawan.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $heading }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('partials.pustakawan.footer')

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>


    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- JS Template -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/chart.js/Chart.min.js"></script>
    <script src="/assets/plugins/sparklines/sparkline.js"></script>
    <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/assets/dist/js/adminlte.js"></script>
    <script src="/assets/dist/js/demo.js"></script>
    <script src="/assets/dist/js/pages/dashboard.js"></script>

    <!-- CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.7/js/froala_editor.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized JS -->
    <script src="/js/pure_cropper.js"></script>
    <script src="/js/title.js"></script>
    <script src="/js/sweet_alert.js"></script>
    <script>
        let table = new DataTable('#data-table');
    </script>

    <script>
        new FroalaEditor('#editor');
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: '--Pilih penerima--'
            });
        });
    </script>

    <script src="/js/calendar.js"></script>
</body>

</html>
