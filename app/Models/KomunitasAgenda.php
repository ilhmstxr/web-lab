<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomunitasAgenda extends Model
{
    use HasFactory;

    protected $table = 'komunitas-_agendas';

    protected $fillable = [
        'komunitas_id',
        'title',
        'schedule',
        'description',
    ];

    protected $casts = [
    'schedule' => 'datetime',
    ];
    
    //Mendefinisikan relasi sebaliknya: Satu Agenda ini MILIK SATU Komunitas.
    
    public function komunitas(): BelongsTo
    {
        return $this->belongsTo(Komunitas::class, 'komunitas_id');
    }
}
