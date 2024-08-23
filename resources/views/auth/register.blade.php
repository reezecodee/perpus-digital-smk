@extends('layouts.auth-layout')
@section('content')
    <div class="self-center">
        <img src="https://img.freepik.com/free-vector/sign-up-concept-illustration_114360-7865.jpg?t=st=1718806665~exp=1718810265~hmac=a410e5ce99500c1c4932549ef32f417864923d78a0df78292d5ee2542049e9db&w=740"
            width="400" alt="" srcset="">
    </div>
    <div class="self-center p-5 shadow-md max-w-md w-full">
        <div class="mb-3 p-4 rounded-lg">
            <p class="text-center text-lg font-semibold mb-4">
                Mohon maaf, aplikasi kami tidak menyediakan pendaftaran secara online. 
                Kamu bisa mengunjungi perpustakaan sekolah untuk mendaftar akun E-perpustakaan. 
                Berikut ini tata cara mendaftar akun:
            </p>
            <ol class="list-decimal space-y-2 text-gray-700 text-justify">
                <li>Kunjungi perpustakaan, budayakan 5S, dan jangan membuat kegaduhan.</li>
                <li>Temui Admin atau pustakawan, sampaikan maksud dan tujuanmu.</li>
                <li>Isi formulir pendaftaran akun yang diberikan oleh pustakawan.</li>
                <li>Pustakawan akan mengaktivasi akunmu, dan akun sudah bisa digunakan.</li>
                <li>Selamat bergabung dan nikmati layanan E-perpustakaan kami!</li>
            </ol>
        </div>
        
        <a href="{{ route('show_login') }}" class="text-sm hover:text-red-primary hover:underline">Sudah punya akun? Login!</a>
    </div>
@endsection
