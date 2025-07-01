<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomunitasAnggota extends Model
{
    use HasFactory;

    protected $table = 'komunitas-_anggotas';

    protected $fillable = [
        'komunitas_id',
        'name',
        'role',
        'photo',
    ];

    //Mendefinisikan relasi sebaliknya: Satu Anggota ini MILIK SATU Komunitas.
    
    public function komunitas(): BelongsTo
    {
        return $this->belongsTo(Komunitas::class, 'komunitas_id');
    }
}
