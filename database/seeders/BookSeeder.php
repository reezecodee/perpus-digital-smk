<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        // Seeder untuk buku fisik
        Book::insert([
            // Data Buku 1
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Bisnis Pasti Sukses dengan Creative Marketing!',
                'author' => 'Andrew Griffiths',
                'penerbit' => 'Gramedia',
                'isbn' => '9483719027381', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b3b9416f6.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku ini menyajikan 101 strategi pemasaran yang jitu dan kreatif untuk memastikan bisnis meraih kesuksesan. Ditulis oleh Andrew Griffiths, panduan ini menawarkan pendekatan yang berfokus pada penggunaan ide-ide inovatif ("otak") ketimbang kekuatan besar ("otot") dalam penjualan, dilengkapi dengan bonus 20 tips praktis untuk diaplikasikan.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 2
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'How to Win Friends & Influence People in The Digital Age',
                'author' => 'Dale Carnegie & Associates, Inc.',
                'penerbit' => 'Gramedia', // Berdasarkan logo GM
                'isbn' => '9582104839210', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b2ec23f06.png',
                'e_book_file' => null,
                'sinopsis' => 'Sebuah adaptasi modern dari buku klasik Dale Carnegie, buku ini mengajarkan prinsip-prinsip fundamental dalam menjalin hubungan dan mempengaruhi orang lain yang disesuaikan untuk era digital. Pembaca akan belajar cara berkomunikasi secara efektif dan membangun pengaruh di tengah dominasi media sosial dan interaksi online.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 3
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => '33 Cara Kaya Ala Bob Sadino: Motivasi Bisnis Anti-Gagal',
                'author' => 'Asterlita SV',
                'penerbit' => 'Gramedia',
                'isbn' => '9382018374928', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b286c85d5.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku ini merangkum 33 filosofi bisnis dan motivasi dari pengusaha legendaris Indonesia, Bob Sadino. Dengan gaya "anti-gagal" yang khas, buku ini menyajikan pandangan unik dan seringkali tidak konvensional tentang memulai dan menjalankan bisnis, mendorong pembaca untuk berani berpikir beda dan bertindak.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 4
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'The Lost Prosperity Secrets of Napoleon Hill: Kiat Sukses di Masa Sulit',
                'author' => 'Napoleon Hill (Diedit oleh Patricia G. Horan)',
                'penerbit' => 'BIP (Kelompok Gramedia)',
                'isbn' => '9204810382910', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b22a899fd.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku ini mengungkap rahasia-rahasia kemakmuran dari Napoleon Hill yang telah lama hilang, dan diperbarui untuk abad ke-21. Buku ini menyajikan kiat-kiat praktis untuk meraih kesuksesan, terutama saat menghadapi masa-masa sulit, berdasarkan prinsip-prinsip yang telah teruji dari salah satu penulis motivasi paling berpengaruh sepanjang masa.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 5
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Jack Ma & Alibaba',
                'author' => 'Yan Qicheng',
                'penerbit' => 'GagasMedia', // Berdasarkan logo
                'isbn' => '9302183928103', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b1d0b5716.png',
                'e_book_file' => null,
                'sinopsis' => 'Sebuah biografi yang mengisahkan perjalanan hidup dan bisnis Jack Ma, pendiri Alibaba. Buku ini menelusuri kisah inspiratifnya dari seorang guru bahasa Inggris hingga menjadi salah satu pengusaha teknologi paling berpengaruh di dunia, mengungkap tantangan, kegagalan, dan visi yang membentuk dirinya dan raksasa e-commerce Alibaba.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 6
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Seni Menjual: Kiat Praktis Meningkatkan Performa Penjualan',
                'author' => 'Harries Madistriyatno',
                'penerbit' => 'Gramedia',
                'isbn' => '9847291038291', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b52aed701.png',
                'e_book_file' => null,
                'sinopsis' => 'Edisi revisi dari buku "Seni Menjual" ini menyajikan kiat-kiat praktis untuk meningkatkan kinerja dan performa dalam dunia penjualan. Buku ini dirancang untuk membantu para profesional penjualan menguasai teknik dan strategi efektif untuk mendekati pelanggan, mengatasi keberatan, dan menutup penjualan dengan sukses.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 7
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Think and Grow Rich',
                'author' => 'Napoleon Hill',
                'penerbit' => 'Gramedia Pustaka Utama', // Berdasarkan logo GT
                'isbn' => '9183920183749', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b47a01223.png',
                'e_book_file' => null,
                'sinopsis' => 'Salah satu buku sukses terlaris sepanjang masa yang mengawali semua bestseller lainnya. Diedit untuk Abad ke-21 dan dilengkapi materi tambahan dari The Napoleon Hill Foundation, buku ini menguraikan filosofi dan 13 langkah menuju kekayaan yang didasarkan pada penelitian terhadap lebih dari 500 orang sukses di zamannya.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 8
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => '100 Juta Pertama Dari Toko Online',
                'author' => 'Tidak ditemukan di sampul',
                'penerbit' => 'Gramedia',
                'isbn' => '9182038472910', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b4d682e23.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku ini merupakan panduan bagi para pengusaha pemula yang ingin meraih pendapatan seratus juta pertama mereka melalui bisnis toko online. Disajikan dalam format yang mudah dipahami, buku ini berfokus pada strategi praktis untuk memulai, mengelola, dan mengembangkan toko online hingga mencapai target pendapatan yang signifikan.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 9
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'The Smart Selling Book',
                'author' => 'Mark Edwards',
                'penerbit' => 'BIP (Kelompok Gramedia)',
                'isbn' => '9837210382918', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b172862bd.png',
                'e_book_file' => null,
                'sinopsis' => 'Sebuah panduan sukses yang mengajarkan pendekatan baru untuk berhasil dalam penjualan. Buku ini menekankan pentingnya menggunakan kecerdasan ("otak") daripada sekadar kerja keras ("otot") untuk mengatasi berbagai kesulitan dalam dunia penjualan modern dan mencapai target.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 10
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Zero to One: Membangun Startup, Membangun Masa Depan',
                'author' => 'Peter Thiel bersama Blake Masters',
                'penerbit' => 'Gramedia Pustaka Utama', // Berdasarkan logo GT
                'isbn' => '9382103847291', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b4170b2f6.png',
                'e_book_file' => null,
                'sinopsis' => 'Ditulis oleh pendiri PayPal, Peter Thiel, buku ini menantang pemikiran konvensional tentang inovasi. Thiel berpendapat bahwa kemajuan sejati datang dari menciptakan sesuatu yang baru (bergerak dari 0 ke 1), bukan meniru yang sudah ada (bergerak dari 1 ke n). Buku ini adalah panduan esensial bagi para pendiri startup tentang bagaimana membangun masa depan dengan berpikir secara orisinal.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 11
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => '30 Hari Jago Jualan',
                'author' => 'Dewa Eka Prayoga',
                'penerbit' => 'Gramedia',
                'isbn' => '9382103847291', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 100,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b35584a49.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku karya Dewa Eka Prayoga ini adalah panduan praktis yang menjanjikan pembaca bisa menjadi jago jualan dalam 30 hari. Buku ini mengungkap rahasia-rahasia agar jualan menjadi laris tanpa harus "mengemis-ngemis" kepada pelanggan, cocok bagi para pengusaha dan penjual yang ingin meningkatkan kemampuannya secara cepat dan efektif.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk buku elektronik
        Book::insert([
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'The 5 Second Rule: Mengubah Hidup, Pekerjaan, dan Keyakinan Anda dengan Keberanian Sehari-hari',
                'author' => 'Mel Robbins',
                'penerbit' => 'Gemilang (Kelompok Pustaka Alvabet)',
                'isbn' => '978-623-7162-64-3',
                'tgl_terbit' => 'Juli 2020',
                'jml_halaman' => 336,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847bd3906903.png',
                'e_book_file' => '6847bd390d3d7.pdf',
                'sinopsis' => 'Buku ini memperkenalkan sebuah aturan sederhana namun kuat untuk mengubah hidup: aturan 5 detik. Mel Robbins menjelaskan bagaimana menghitung mundur 5-4-3-2-1 dapat membantu mengatasi keraguan, mengalahkan rasa takut, dan mendorong diri untuk bertindak.  Dengan membagikan kisah nyata dari dirinya dan orang lain di seluruh dunia, buku ini menunjukkan bagaimana keberanian sehari-hari dapat digunakan untuk memperbaiki kesehatan, meningkatkan produktivitas, memperkaya hubungan, dan membangun kepercayaan diri yang sesungguhnya. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 2
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'The Art of War: Seni Perang',
                'author' => 'Sun Tzu',
                'penerbit' => 'IKON TERALITERA',
                'isbn' => '979-3016-15-9',
                'tgl_terbit' => 'Agustus 2003',
                'jml_halaman' => 118,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847b9592097c.png',
                'e_book_file' => '6847b9592331e.pdf',
                'sinopsis' => 'Ditulis lebih dari dua ribu tahun yang lalu, "The Art of War" adalah risalah militer klasik oleh Sun Tzu.  Buku ini menguraikan prinsip-prinsip fundamental strategi dan taktik perang, yang menekankan pentingnya perencanaan, penipuan, dan pemahaman mendalam tentang musuh serta diri sendiri untuk meraih kemenangan.  Ajarannya tidak hanya relevan untuk konflik militer tetapi juga telah diadopsi secara luas dalam dunia bisnis, politik, dan kehidupan sehari-hari sebagai panduan untuk mencapai tujuan dan mengatasi tantangan. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 3
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Berpikir dan Berjiwa Besar (The Magic of Thinking Big)',
                'author' => 'David J. Schwartz',
                'penerbit' => 'Gramedia',
                'isbn' => '8791572917328', // Angka acak karena tidak ditemukan
                'tgl_terbit' => '2017',
                'jml_halaman' => 105,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847bad75afa8.png',
                'e_book_file' => '6847bad75e30e.pdf',
                'sinopsis' => 'Buku ini menyajikan metode praktis untuk mencapai keberhasilan dan kepuasan hidup dengan mengubah pola pikir.  David J. Schwartz mengajarkan bahwa ukuran keberhasilan seseorang ditentukan oleh ukuran pemikirannya.  Pembaca akan belajar bagaimana membangun kepercayaan diri, menghancurkan ketakutan, berpikir kreatif, dan mengembangkan sikap positif.  Buku ini menawarkan teknik-teknik yang dapat diterapkan untuk menyembuhkan diri dari "penyakit dalih", mengatur lingkungan, dan mengubah kekalahan menjadi kemenangan. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 4
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'How to Win an Argument: Sebuah Panduan Klasik tentang Seni Persuasi',
                'author' => 'Marcus Tullius Cicero',
                'penerbit' => 'KPG (Kepustakaan Populer Gramedia)',
                'isbn' => '978-602-48-1560-8',
                'tgl_terbit' => 'Mei 2021',
                'jml_halaman' => 317,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847bc2906254.png',
                'e_book_file' => '6847bc2908b57.pdf',
                'sinopsis' => 'Kumpulan tulisan dari orator Romawi legendaris, Marcus Tullius Cicero, yang menguraikan seni persuasi secara mendalam.  Buku ini menyajikan sistem retorika kuno, dari langkah-langkah persiapan seperti penemuan (inventio), penyusunan (arrangement), gaya (style), hingga ingatan (memory) dan penyampaian (delivery).  Cicero menekankan pentingnya argumentasi rasional (logos), penyajian karakter (ethos), dan tarikan emosi (pathos) untuk dapat secara efektif memenangkan sebuah argumen dalam berbagai konteks. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 5
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Building a StoryBrand: Clarify Your Message So Customers Will Listen',
                'author' => 'Donald Miller',
                'penerbit' => 'HarperCollins Leadership',
                'isbn' => '9780718033330',
                'tgl_terbit' => '2017',
                'jml_halaman' => 199,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847bb66ad570.png',
                'e_book_file' => '6847bb66afe84.pdf',
                'sinopsis' => 'Buku ini memperkenalkan Kerangka SB7 (StoryBrand 7-Part Framework), sebuah metode untuk mengklarifikasi pesan sebuah merek agar didengar oleh pelanggan.  Prinsip utamanya adalah memposisikan pelanggan sebagai pahlawan dan merek sebagai pemandu dalam sebuah cerita.  Donald Miller menjelaskan bagaimana menggunakan tujuh elemen universal dari cerita yang kuat untuk menyederhanakan komunikasi, terhubung dengan kebutuhan terdalam pelanggan, dan pada akhirnya menumbuhkan bisnis dengan mengubah cara Anda berbicara tentang bisnis Anda. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data Buku 6
            [
                'id' => Str::uuid(),
                'kategori_id' => self::getBookCategory('Tutorial'),
                'judul' => 'Unfair Advantage: Kekuatan Pendidikan Finansial',
                'author' => 'Robert T. Kiyosaki',
                'penerbit' => 'PT Gramedia Pustaka Utama, Jakarta',
                'isbn' => '978-602-06-4383-0',
                'tgl_terbit' => 'Juni 2013',
                'jml_halaman' => 326,
                'bahasa' => 'Indonesia',
                'cover_buku' => '6847ba391a9ad.png',
                'e_book_file' => '6847ba391d59e.pdf',
                'sinopsis' => 'Dalam buku ini, Robert T. Kiyosaki berpendapat bahwa keuntungan terbesar di dunia saat ini adalah pendidikan finansial yang kuat.  Ia menguraikan lima keuntungan tak adil yang diberikan oleh pengetahuan finansial: Pengetahuan itu sendiri, Pajak, Utang, Risiko, dan Kompensasi.  Buku ini membedakan pendidikan akademis tradisional yang mempersiapkan orang untuk menjadi karyawan (kuadran E dan S) dengan pendidikan finansial dunia nyata yang penting untuk menjadi pemilik bisnis dan investor yang sukses (kuadran B dan I), yang pada akhirnya mengajarkan pembaca cara membuat uang bekerja untuk mereka. ',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public static function getBookCategory($categoryName)
    {
        return Category::where('nama_kategori', $categoryName)->firstOrFail()->id;
    }
}
