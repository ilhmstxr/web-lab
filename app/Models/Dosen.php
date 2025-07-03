<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\DosenFactory> */
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
        'name',
        'nip',
        'email',
        'phone',
        'address',
        'photo',
        'institution'
    ];

    public function labs()
    {
        return $this->hasMany(Lab::class, 'dosen_id');
    }
    public function publishers()
    {
        return $this->hasMany(Publisher::class, 'dosen_id');
    }
    public function researchFocuses()
    {
        return $this->hasMany(ResearchFocus::class, 'dosen_id');
    }
}
