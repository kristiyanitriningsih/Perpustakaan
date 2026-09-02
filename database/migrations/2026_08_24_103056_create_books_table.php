<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id', true)->primary();
            $table->string('kode_buku', 50)->unique();
            $table->string('judul', 255)->nullable();
            $table->string('pengarang', 150)->nullable();
            $table->string('penerbit', 100)->nullable();
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
