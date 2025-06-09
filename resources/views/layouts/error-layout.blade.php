<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($exception))
    <title>Error {{ $exception->getStatusCode() }} - {{ $exception->getMessage() }}</title>
    @endif
    @if(!isset($exception))
    <title>{{ $title }} - {{ $app->nama_perpustakaan ?? 'Perpustakaan Digital' }}</title>
    @endif
    <link rel="shortcut icon" href="{{ $app->favicon ? '/img/'.$app->favicon : '' }}" type="image/x-icon">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css & js -->
    <link href="/css/rating.css" rel="stylesheet" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-quicksand">
    <div class="h-screen flex items-center justify-center">
        <div>
            <div class="flex justify-center">
                @yield('content')
            </div>
            @if(isset($exception))
            <h2 class="text-center font-bold text-lg">{{ $exception->getStatusCode() }} - {{ $exception->getMessage() }}
            </h2>
            @endif

            @if(!isset($exception))
            <h2 class="text-center font-bold text-lg mb-2">
                Berhasil Melakukan Pembayaran Denda.
            </h2>
            <div class="flex justify-center">
                <a href="">
                    <x-borrower.button.normal-btn>Kembali ke Detail Pembayaran</x-borrower.button.normal-btn>
                </a>
            </div>
            @endif
        </div>
    </div>
</body>

</html>