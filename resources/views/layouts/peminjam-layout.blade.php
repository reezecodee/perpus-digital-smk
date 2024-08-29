<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ request()->path() }}">
    <title>{{ $title }}</title>
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
    <!-- CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- css & js -->
    <link href="/css/rating.css" rel="stylesheet" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-quicksand">
    @if (session('show_popup'))
        <div id="loginPopup"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="p-8 rounded shadow-md w-1/2 relative">
                <div id="popupImages" class="flex flex-wrap gap-4 justify-center relative popup-enter">
                    @foreach ($popup_images as $index => $image)
                        <a href="{{ $image->link ? $image->link : 'javascript:void(0)' }}">
                            <div class="popup-image {{ $index > 0 ? 'hidden' : '' }}" data-index="{{ $index }}">
                                <img src="{{ asset('storage/img/popup/' . ($image->popup_file ?? 'unknown.jpg')) }}"
                                    alt="Popup Image" class="w-full object-cover rounded">
                            </div>
                        </a>
                    @endforeach
                    <button id="closePopup"
                        class="w-12 h-12 bg-red-primary rounded-full border-2 border-white m-2 text-white absolute -top-5 right-0"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    @endif

    <x-peminjam.navigation.navbar />
    @yield('content')
    @if ($chat_bubble ?? true)
        <x-peminjam.navigation.bubble />
    @endif

    <x-peminjam.navigation.footer />


    <!-- CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- JavaScript -->
    <script src="/js/swiper.js"></script>
    <script src="/js/title.js"></script>
    <script src="/js/calendar.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#data-table').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popupImages = document.querySelectorAll('.popup-image');
            const closeButton = document.getElementById('closePopup');
            let currentPopupIndex = 0;

            function showNextPopup() {
                if (currentPopupIndex < popupImages.length) {
                    popupImages[currentPopupIndex].classList.remove('hidden');
                }
            }

            function hideCurrentPopup() {
                if (currentPopupIndex < popupImages.length) {
                    popupImages[currentPopupIndex].classList.add('hidden');
                    popupImages[currentPopupIndex].classList.remove('popup-enter');
                    currentPopupIndex++;
                    if (currentPopupIndex < popupImages.length) {
                        popupImages[currentPopupIndex].classList.remove('hidden');
                        popupImages[currentPopupIndex].classList.add('popup-enter');
                    } else {
                        document.getElementById('loginPopup').classList.add(
                            'hidden');
                    }
                }

            }

            closeButton.addEventListener('click', hideCurrentPopup);

            showNextPopup();
        });
    </script>
</body>

</html>
