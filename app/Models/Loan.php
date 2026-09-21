<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengunjung_id',
        'no_telp',
        'buku_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
        'jumlah',

    ];

    public function books()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }
}