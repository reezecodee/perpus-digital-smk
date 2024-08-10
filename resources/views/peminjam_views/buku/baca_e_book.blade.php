<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Flipbook StyleSheet -->
    <link href="/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">

    <!-- Icons Stylesheet -->
    <link href="/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f4ecd8]">

    <div>
        <!--Normal FLipbook-->
        <div class="_df_book" height="100vh" backgroundcolor="#f4ecd8" webgl="true" source="{{ asset('storage/pdf/' . ($book->e_book_file ?? 'not_found.pdf')) }}"
            id="df_manual_book">
            <div
                class="bg-white rounded-bl-md absolute top-0 right-0 p-3 font-quicksand font-semibold text-red-primary z-50 pointer-events-auto">
                <a class="cursor-pointer" href="{{ url()->previous() }}"><i class="fas fa-times"></i> Kembali</a>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="/dflip/js/libs/jquery.min.js" type="text/javascript"></script>
    <!-- Flipbook main Js file -->
    <script src="/dflip/js/dflip.min.js" type="text/javascript"></script>

</body>

</html>
