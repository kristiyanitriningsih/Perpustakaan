<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'kode_buku' => '001',
            'judul' => 'Pulang',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Republika Penerbit',
            'stok' => 10,
            'genre' => 'Aksi',
            'foto' => 'pulang.jpg',
        ]);

        Book::create([
            'kode_buku' => '002',
            'judul' => 'Laskar Pelangi',
            'pengarang' => 'Andrea Hirata',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 8,
            'genre' => 'Fiksi Inspiratif',
            'foto' => 'laskarpelangi.jpg',
        ]);

        Book::create([
            'kode_buku' => '003',
            'judul' => 'Bumi',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Republika Penerbit',
            'stok' => 6,
            'genre' => 'Fantasi',
            'foto' => 'bumi.jpg',
        ]);

        Book::create([
            'kode_buku' => '004',
            'judul' => 'Hujan',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Republika Penerbit',
            'stok' => 6,
            'genre' => 'Sci-Fi',
            'foto' => 'hujan.png',
        ]);

        Book::create([
            'kode_buku' => '005',
            'judul' => 'Bulan',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Republika Penerbit',
            'stok' => 6,
            'genre' => 'Fantasi',
            'foto' => 'bulan.jpg',
        ]);

        Book::create([
            'kode_buku' => '006',
            'judul' => 'Matahari',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 8,
            'genre' => 'Fantasi',
            'foto' => 'matahari.jpg',
        ]);

        Book::create([
            'kode_buku' => '007',
            'judul' => 'Bintang',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 5,
            'genre' => 'Fantasi',
            'foto' => 'bintang.jpg',
        ]);

        Book::create([
            'kode_buku' => '008',
            'judul' => 'Ceros dan Batozar',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 7,
            'genre' => 'Fantasi',
            'foto' => 'cerosdanbatozar.jpg',
        ]);

        Book::create([
            'kode_buku' => '009',
            'judul' => 'Komet',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 10,
            'genre' => 'Fantasi',
            'foto' => 'komet.jpg',
        ]);

        Book::create([
            'kode_buku' => '010',
            'judul' => 'Komet Minor',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'stok' => 4,
            'genre' => 'Fantasi',
            'foto' => 'kometminor.jpg',
        ]);
    }
}
