<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['nama', 'email', 'phone', 'address', 'city', 'state', 'zip'];
}
