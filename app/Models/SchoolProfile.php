<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'sambutan_kepsek',
        'logo',
        'banner',
        'foto_profil',
        'foto_kepala_sekolah',
        'motto',
    ];
}
