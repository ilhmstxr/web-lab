<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'tanggal',
        'tempat',
        'poster',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
