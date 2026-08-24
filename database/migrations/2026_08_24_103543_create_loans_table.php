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
        Schema::create('loans', function (Blueprint $table) {
            $table->integer('id', true)->primary();
            $table->integer('pengunjung_id');
            $table->foreign('pengunjung_id')->references('id')->on('visitors')->cascadeOnDelete();
            $table->integer('buku_id');
            $table->foreign('buku_id')->references('id')->on('books')->cascadeOnDelete();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['dipinjam', 'dikembalikan']);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
