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
    public function run(): void
    {
        // Seeder untuk buku fisik
        Book::insert([
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => '100 Juta Pertama Dari Toko Online',
                'author' => 'Fahmi Hakim',
                'penerbit' => 'kelasbos.com',
                'isbn' => '1923082501',
                'tgl_terbit' => '20 Mei 2015',
                'jml_halaman' => '95',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-1.png',
                'e_book_file' => null,
                'sinopsis' => 'Buku "100 Juta Pertama dari Toko Online" adalah panduan praktis dan peta jalan yang lugas bagi siapa saja yang ingin mengubah toko online mereka menjadi mesin penghasil pendapatan yang signifikan. Ditulis berdasarkan pengalaman nyata, buku ini membongkar strategi dan langkah-langkah konkret untuk meraih target omzet Rp 100.000.000 pertama, sebuah tonggak pencapaian yang krusial bagi setiap pebisnis online.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'Think and Grow Rich',
                'author' => 'Napoleon Hill',
                'penerbit' => 'Gramedia Pustaka Utama',
                'isbn' => '9786020630670',
                'tgl_terbit' => '20 Mei 2019',
                'jml_halaman' => '406',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-2.png',
                'e_book_file' => null,
                'sinopsis' => 'Ditulis oleh Napoleon Hill setelah lebih dari 20 tahun meneliti para jutawan dan orang-orang paling sukses di zamannya seperti Andrew Carnegie, Henry Ford, dan Thomas Edison, Think and Grow Rich bukanlah sekadar buku tentang cara menghasilkan uang. Ini adalah sebuah panduan abadi tentang filosofi kesuksesan yang dapat diterapkan dalam bidang apa pun.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'Bisnis Pasti Sukses dengan Creative Marketing!',
                'author' => 'Andrew Griffiths',
                'penerbit' => 'Tangga Pustaka',
                'isbn' => '9790830319',
                'tgl_terbit' => '20 Mei 2011',
                'jml_halaman' => '340',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-3.png',
                'e_book_file' => null,
                'sinopsis' => 'Apakah Anda lelah bersaing dengan cara yang itu-itu saja? Merasa promosi bisnis Anda tidak lagi dilirik di tengah lautan kompetitor yang semakin padat? Anggaran iklan terus membengkak, tetapi hasil yang didapat tidak sepadan? Jika ya, maka buku "Bisnis Pasti Sukses dengan Creative Marketing!" adalah jawaban yang Anda cari. Buku ini hadir dengan premis sederhana namun kuat: di era digital yang bising, kunci kemenangan bukanlah siapa yang paling keras berteriak (atau paling besar beriklan), melainkan siapa yang paling cerdas dan kreatif dalam mencuri perhatian.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => '30 Hari Jago Jualan',
                'author' => 'Dewa Eka Prayoga',
                'penerbit' => 'Delta Saputra',
                'isbn' => '1923082502',
                'tgl_terbit' => '20 Mei 2014',
                'jml_halaman' => '178',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-4.png',
                'e_book_file' => null,
                'sinopsis' => '"30 Hari Jago Jualan" karya Dewa Eka Prayoga bukanlah buku teori biasa. Ini adalah sebuah buku tantangan, sebuah program pelatihan intensif selama 30 hari yang dirancang untuk mengubah Anda dari seorang penjual biasa menjadi seorang "Jagoan Jualan" yang percaya diri dan efektif. Buku ini disusun secara unik dalam format 30 bab, di mana setiap bab mewakili satu hari. Setiap hari, Anda akan mempelajari satu materi spesifik, lengkap dengan tugas praktis yang harus langsung Anda kerjakan. Konsepnya sederhana: satu hari, satu materi, satu praktik.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'The Smart Selling Book',
                'author' => 'Mark Edwards',
                'penerbit' => 'LID Publishing Limited',
                'isbn' => '9786232169200',
                'tgl_terbit' => '20 Mei 2017',
                'jml_halaman' => '152',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-5.png',
                'e_book_file' => null,
                'sinopsis' => 'Di dunia penjualan yang terus berubah, metode-metode lama yang agresif dan memaksa (hard selling) sudah tidak lagi efektif. Pelanggan modern, terutama di pasar B2B (business-to-business), lebih cerdas dan membutuhkan pendekatan yang lebih strategis. Lalu, bagaimana cara menjual dengan lebih cerdas, bukan hanya lebih keras? "The Smart Selling Book" karya Mark Edwards adalah jawabannya. Buku ini merupakan kumpulan wawasan, strategi, dan teknik penjualan modern yang disaring dari pengalaman penulis selama 30 tahun di dunia penjualan internasional. Buku ini dirancang khusus untuk para profesional yang ingin meninggalkan cara-cara usang dan beralih ke metode penjualan yang lebih cerdas dan elegan.',
                'format' => 'Fisik',
                'status' => 'Tersedia',
            ],
        ]);

        // Seeder untuk buku elektronik
        Book::insert([
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => '100 Juta Pertama Dari Toko Online',
                'author' => 'Fahmi Hakim',
                'penerbit' => 'kelasbos.com',
                'isbn' => '1923082501',
                'tgl_terbit' => '20 Mei 2015',
                'jml_halaman' => '95',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-1.png',
                'e_book_file' => 'ebook1.pdf',
                'sinopsis' => 'Buku "100 Juta Pertama dari Toko Online" adalah panduan praktis dan peta jalan yang lugas bagi siapa saja yang ingin mengubah toko online mereka menjadi mesin penghasil pendapatan yang signifikan. Ditulis berdasarkan pengalaman nyata, buku ini membongkar strategi dan langkah-langkah konkret untuk meraih target omzet Rp 100.000.000 pertama, sebuah tonggak pencapaian yang krusial bagi setiap pebisnis online.',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'Think and Grow Rich',
                'author' => 'Napoleon Hill',
                'penerbit' => 'Gramedia Pustaka Utama',
                'isbn' => '9786020630670',
                'tgl_terbit' => '20 Mei 2019',
                'jml_halaman' => '406',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-2.png',
                'e_book_file' => 'ebook2.pdf',
                'sinopsis' => 'Ditulis oleh Napoleon Hill setelah lebih dari 20 tahun meneliti para jutawan dan orang-orang paling sukses di zamannya seperti Andrew Carnegie, Henry Ford, dan Thomas Edison, Think and Grow Rich bukanlah sekadar buku tentang cara menghasilkan uang. Ini adalah sebuah panduan abadi tentang filosofi kesuksesan yang dapat diterapkan dalam bidang apa pun.',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'Bisnis Pasti Sukses dengan Creative Marketing!',
                'author' => 'Andrew Griffiths',
                'penerbit' => 'Tangga Pustaka',
                'isbn' => '9790830319',
                'tgl_terbit' => '20 Mei 2011',
                'jml_halaman' => '340',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-3.png',
                'e_book_file' => 'ebook3.pdf',
                'sinopsis' => 'Apakah Anda lelah bersaing dengan cara yang itu-itu saja? Merasa promosi bisnis Anda tidak lagi dilirik di tengah lautan kompetitor yang semakin padat? Anggaran iklan terus membengkak, tetapi hasil yang didapat tidak sepadan? Jika ya, maka buku "Bisnis Pasti Sukses dengan Creative Marketing!" adalah jawaban yang Anda cari. Buku ini hadir dengan premis sederhana namun kuat: di era digital yang bising, kunci kemenangan bukanlah siapa yang paling keras berteriak (atau paling besar beriklan), melainkan siapa yang paling cerdas dan kreatif dalam mencuri perhatian.',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => '30 Hari Jago Jualan',
                'author' => 'Dewa Eka Prayoga',
                'penerbit' => 'Delta Saputra',
                'isbn' => '1923082502',
                'tgl_terbit' => '20 Mei 2014',
                'jml_halaman' => '178',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-4.png',
                'e_book_file' => 'ebook4.pdf',
                'sinopsis' => '"30 Hari Jago Jualan" karya Dewa Eka Prayoga bukanlah buku teori biasa. Ini adalah sebuah buku tantangan, sebuah program pelatihan intensif selama 30 hari yang dirancang untuk mengubah Anda dari seorang penjual biasa menjadi seorang "Jagoan Jualan" yang percaya diri dan efektif. Buku ini disusun secara unik dalam format 30 bab, di mana setiap bab mewakili satu hari. Setiap hari, Anda akan mempelajari satu materi spesifik, lengkap dengan tugas praktis yang harus langsung Anda kerjakan. Konsepnya sederhana: satu hari, satu materi, satu praktik.',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
            ],
            [
                'id' => Str::uuid(),
                'kategori_id' => $this->getBookCategory('Tutorial'),
                'judul' => 'The Smart Selling Book',
                'author' => 'Mark Edwards',
                'penerbit' => 'LID Publishing Limited',
                'isbn' => '9786232169200',
                'tgl_terbit' => '20 Mei 2017',
                'jml_halaman' => '152',
                'bahasa' => 'Indonesia',
                'cover_buku' => 'cover-5.png',
                'e_book_file' => 'ebook5.pdf',
                'sinopsis' => 'Di dunia penjualan yang terus berubah, metode-metode lama yang agresif dan memaksa (hard selling) sudah tidak lagi efektif. Pelanggan modern, terutama di pasar B2B (business-to-business), lebih cerdas dan membutuhkan pendekatan yang lebih strategis. Lalu, bagaimana cara menjual dengan lebih cerdas, bukan hanya lebih keras? "The Smart Selling Book" karya Mark Edwards adalah jawabannya. Buku ini merupakan kumpulan wawasan, strategi, dan teknik penjualan modern yang disaring dari pengalaman penulis selama 30 tahun di dunia penjualan internasional. Buku ini dirancang khusus untuk para profesional yang ingin meninggalkan cara-cara usang dan beralih ke metode penjualan yang lebih cerdas dan elegan.',
                'format' => 'Elektronik',
                'status' => 'Tersedia',
            ],
        ]);
    }

    public function getBookCategory($categoryName)
    {
        return Category::where('nama_kategori', $categoryName)->firstOrFail()->id;
    }
}
