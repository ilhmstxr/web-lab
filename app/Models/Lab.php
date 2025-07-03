<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $table = 'lab';
    protected $fillable = [
        'name',
        'headLab',
        'description',
        'image',
        'fileSop',
    ];

    /**
     * Dapatkan URL lengkap untuk file SOP.
     * Anda bisa memanggil ini di Blade dengan $lab->fileSopUrl
     */
    public function getFileSopUrlAttribute(): ?string
    {
        return $this->fileSop ? asset('storage/' . $this->fileSop) : null;
    }

    public function head()
    {
        return $this->belongsTo(Dosen::class, 'headLab');
    }

    public function researchFocuses()
    {
        return $this->hasMany(ResearchFocus::class, 'lab_id');
    }

    public function sops()
    {
        return $this->hasMany(Sop::class, 'lab_id');
    }

    public function publishers()
    {
        return $this->hasMany(Publisher::class, 'lab_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'headLab');
    }

    // update lagi
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    


    
}
