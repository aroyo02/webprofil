<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi)
    protected $table = 'sarana_prasaranas';

    // Kolom yang boleh diisi melalui mass-assignment
    protected $fillable = [
        'nama',
        'gambar',
    ];
}
