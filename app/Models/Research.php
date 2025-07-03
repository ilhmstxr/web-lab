<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
        use HasFactory;    
        
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'topic_id',
        'author',
        'year',
        'status',
        'institution',
        'funding',
        'fund',
        'youtubeLink',
        'repositoryLink',
        'npm',
        'angkatan',
        'interest',
    ];

    public function category()
    {
        return $this->belongsTo(ResearchCategory::class);
    }
    public function topic()
    {
        return $this->belongsTo(ResearchTopic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
