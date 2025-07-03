<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';

    protected $fillable = [
        'header_foto',
        'name',
        'tagline',
        'logo',
        'about',
    ];
    
    //Mendefinisikan relasi "One to Many": Satu Komunitas punya BANYAK Anggota.
    public function komunitasAnggotas(): HasMany
    {
        // Parameter kedua adalah foreign key di tabel 'komunitas-_angotas'
        return $this->hasMany(KomunitasAnggota::class, 'komunitas_id');
    }

    
    //Mendefinisikan relasi "One to Many": Satu Komunitas punya BANYAK Agenda.
    
    public function komunitasAgendas(): HasMany
    {
        // Parameter kedua adalah foreign key di tabel 'komunitas-_agendas'
        return $this->hasMany(KomunitasAgenda::class, 'komunitas_id');
    }

}
