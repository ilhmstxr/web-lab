<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'lab_type', // Tambahkan kolom lab_type di sini
        'file_path',
    ];

    /**
     * Dapatkan URL lengkap untuk file PDF SOP.
     * Anda bisa memanggil ini di Blade dengan $sop->file_url
     */
    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
