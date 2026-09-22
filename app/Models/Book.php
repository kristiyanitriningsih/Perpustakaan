<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'foto',
        'kode_buku',
        'judul',
        'pengarang',
        'penerbit',
        'stok',
    ];

    public function loan()
    {
        return $this->hasMany(Loan::class, 'buku_id', 'id');
    }
}