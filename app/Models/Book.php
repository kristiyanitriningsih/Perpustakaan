<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'kode_buku',
        'judul',
        'pengarang',
        'penerbit',
        'stok',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'buku_id', 'id');
    }
}