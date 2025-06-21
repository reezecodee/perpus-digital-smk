@php
    $buttonRoute = '';

    if (auth()->check()) {
        if (
            auth()
                ->user()
                ->hasAnyRole(['Admin', 'Pustakawan'])
        ) {
            $buttonRoute = route('show.dashboard');
        } else {
            $buttonRoute = route('show.homepage');
        }
    } else {
        $buttonRoute = route('show.login');
    }
@endphp

<x-student-layout :title="$title" :bubble="false">
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-24 mx-auto lg:gap-8 xl:gap-0 lg:py-14 lg:grid-cols-12 lg:pt-32">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    Bangun Generasi Emas, <br class="hidden lg:block">Dengan Membaca Buku</h1>
                <p
                    class="max-w-2xl mb-6 font-medium text-gray-500 lg:mb-8 md:text-lg lg:text-lg dark:text-gray-400 text-justify lg:text-left">
                    Selamat datang di e-perpus SMK Digital Sistem Informatika. Kami
                    berkomitmen menyediakan e-perpus bagi para siswa dan membantu mereka meningkatkan pengetahuan
                    dan kenyamanan dalam proses peminjaman buku perpustakaan.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="{{ $buttonRoute }}"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm text-center text-white font-semibold border rounded-full sm:w-auto hover:bg-red-500 bg-red-primary">
                        Jelajahi E-perpus
                    </a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="/img/assets/librarians.webp" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-12 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400 text-justify lg:text-left">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Membangun
                        Jiwa Siswa yang Bermanfaat dan Berdampak</h2>
                    <p class="mb-5 font-medium lg:text-lg">Membentuk siswa terdepan yang memberikan manfaat nyata dan
                        dampak positif bagi masyarakat, lingkungan, dan seluruh pemangku kepentingan melalui inovasi,
                        keberlanjutan, dan tanggung jawab sosial.</p>
                    <p class="font-medium lg:text-lg">Untuk mencapai hal tersebut dibutuhkan tindakan nyata seperti
                    </p>
                    <ul class="list-disc mb-8 font-medium lg:text-lg ml-9">
                        <li>Memberdayakan siswa dengan literasi membaca</li>
                        <li>Menyediakan platform e-perpus sebagai sarana peminjaman</li>
                        <li>Menciptakan lingkungan perpustakaan yang tenang dan aman</li>
                        <li>Menjunjung tinggi etika dan integritas</li>
                    </ul>
                </div>
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="/img/assets/team_goals.webp"
                    alt="">
            </div>
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="/img/assets/remote.webp"
                    alt="feature image 2">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Komitmen
                        Terhadap
                        Kualitas dan Layanan</h2>
                    <p class="mb-5 font-medium lg:text-lg text-justify lg:text-left">Kami menerapkan standar kualitas
                        yang ketat dalam setiap aspek
                        operasional kami, mulai dari peminjaman sampai pengembalian buku. Pustakawan kami yang
                        berpengalaman dan berdedikasi bekerja tanpa henti untuk memantau setiap aktivitas dan memenuhi
                        harapan instansi sekolah dalam mencetak siswa yang unggul.</p>
                    <p class="font-medium lg:text-lg text-justify lg:text-left">Kami menyadari bahwa pelayanan yang
                        unggul sama pentingnya
                        dengan profesi berkualitas. <b>Your satisfaction is our top priority!</b></p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
            <figure class="max-w-screen-md mx-auto">
                <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                        fill="currentColor" />
                </svg>
                <blockquote>
                    <p class="text-xl font-medium text-gray-900 md:text-2xl">"Semakin banyak kamu membaca, semakin
                        banyak hal yang kamu ketahui. Semakin banyak kamu belajar, semakin banyak tempat yang akan kamu
                        datangi."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3">
                    <img class="w-10 h-10 lg:w-6 lg:h-6 rounded-full" src="/img/atyla_profile.png"
                        alt="profile picture">
                    <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                        <div class="pr-3 font-medium text-gray-900 dark:text-white">Atyla A. Al Harits</div>
                        <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">Kepala Perpustakaan SMK
                            Digital Sistem Informatika</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
</x-student-layout>
