<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriPustaka extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'sampul',
        'deskripsi',
        'kategori',
    ];
}
