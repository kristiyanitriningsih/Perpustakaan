<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pengunjung',
        'nama',
        'telp',
        'alamat',

    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'pengunjung_id', 'id');
    }
}