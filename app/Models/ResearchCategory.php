<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    public function researchTopics()
    {
        return $this->hasMany(ResearchTopic::class);
    }
    public function research()
    {
        return $this->hasMany(Research::class);
    }
    
}
