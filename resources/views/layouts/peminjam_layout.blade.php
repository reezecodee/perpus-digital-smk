<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
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
    <!-- CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <!-- css & js -->
    <link href="/css/rating.css" rel="stylesheet" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-quicksand">
    @include('partials.peminjam.navbar')
    @yield('content')
    @if($chat_bubble ?? true)
    <div class="fixed bottom-3 right-3 lg:bottom-10 lg:right-10">
        <a href="" class="flex flex-col justify-center items-center">
            <div
                class="bg-red-primary hover:bg-red-500 flex items-center justify-center border-2 border-white w-14 h-14 rounded-full">
                <i class="fas fa-comments text-xl text-white text-center"></i>
            </div>
            <span class="mt-1 text-center text-black font-semibold">Hubungi kami</span>
        </a>
    </div>
    @endif
    @include('partials.peminjam.footer')

    <!-- CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    
    <!-- JavaScript -->
    <script src="/js/swiper.js"></script>
    <script>
        let table = new DataTable('#data-table');
    </script>
</body>

</html>
