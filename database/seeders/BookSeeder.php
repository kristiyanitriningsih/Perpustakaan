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
        \App\Models\Book::create([
            'kode_buku' => '001',
            'judul' => 'Pulang',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Republika',
            'stok' => 10,
         ]);
    }
}
