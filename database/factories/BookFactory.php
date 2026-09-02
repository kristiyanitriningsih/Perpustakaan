<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_buku'    => fake()->unique()->bothify('???-###'),
            'judul'        => fake()->sentence(3),
            'pengarang'    =>fake()->name(),
            'penerbit'     =>fake()->company(),
            'stok'         =>fake()->numberBetween(1, 100),
        ];
    }
}
