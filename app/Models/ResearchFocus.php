<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchFocus extends Model
{
    /** @use HasFactory<\Database\Factories\ResearchFocusFactory> */
    use HasFactory;

    protected $table = 'research_foci';

    protected $fillable = [
        'name',
        'description',
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }
    public function sops()
    {
        return $this->hasMany(Sop::class, 'research_focus_id');
    }
}
