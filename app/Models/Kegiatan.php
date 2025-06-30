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
        'youtube_url',
        'views_count',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getIsLikedByUserAttribute()
    {
        return auth()->check() ? $this->likes()->where('user_id', auth()->id())->exists() : false;
    }

    protected $withCount = ['likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}