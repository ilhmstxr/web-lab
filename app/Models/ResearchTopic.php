<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchTopic extends Model
{
    /** @use HasFactory<\Database\Factories\ResearchTopicFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(ResearchCategory::class);
    }
    public function research()
    {
        return $this->hasMany(Research::class);
    }


}
