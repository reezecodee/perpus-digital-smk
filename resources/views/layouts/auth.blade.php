<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ $app->nama_perpustakaan ?? 'Perpustakaan Digital' }}</title>
    <link rel="shortcut icon" href="{{ $app->favicon ? '/img/'.$app->favicon : '' }}" type="image/x-icon">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css & js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="loader" class="loader-container hidden">
        <div class="loader"></div>
    </div>
    <section class="font-quicksand font-semibold">
        <div class="container mx-auto px-3 lg:px-0">
            <div class="flex flex-wrap gap-24 justify-center items-center h-screen">
                {{ $slot }}
            </div>
        </div>
    </section>

    <script>
        // animasi loading
        function showLoader() {
            document.getElementById('loader').classList.remove('hidden');
        }

        function hideLoader() {
            document.getElementById('loader').classList.add('hidden');
        }

        window.addEventListener('beforeunload', function(event) {
            showLoader()

            window.addEventListener("load", function() {
                hideLoader();
            });
        });
    </script>
</body>

</html>
