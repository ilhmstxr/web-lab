<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAbsensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';
    protected $fillable = [
        'nip',
        'nama',
        'status',
        'entry_date',
        'laboratorium',
        'tujuan',
    ];
}
