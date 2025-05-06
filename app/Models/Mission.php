<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'missions'; // pastikan nama tabel benar (opsional jika sudah sesuai konvensi)
    
    protected $fillable = ['content'];

    // Jika ingin menonaktifkan timestamps (jika tabel tidak punya kolom created_at, updated_at)
    public $timestamps = false;
}
