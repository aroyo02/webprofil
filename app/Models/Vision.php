<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;

    protected $table = 'visions'; // opsional, untuk memastikan nama tabel

    protected $fillable = ['content'];

    public $timestamps = false; // jika tidak menggunakan created_at & updated_at
}
