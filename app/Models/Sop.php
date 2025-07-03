<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    /** @use HasFactory<\Database\Factories\SopFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id', // Foreign key to sop_categories table
        'description',
    ];

    /**
     * Dapatkan URL lengkap untuk file PDF SOP.
     * Anda bisa memanggil ini di Blade dengan $sop->file_url
     */
    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    public function category()
    {
        return $this->belongsTo(SopCategory::class, 'category_id');
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

}
