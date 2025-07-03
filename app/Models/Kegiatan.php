<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'tanggal',
        'tempat',
        'poster',
        'youtube_url',
        'views_count',
        'likes_count',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal' => 'date',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}