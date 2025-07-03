<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortofolioFactory> */
    use HasFactory;

    protected $table = 'portofolios';
    protected $fillable = [
        'Name',
        'Title',
        'Description',
        'Image',
        'Link',
        'Category',
        'Status',
        'Visibility',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'portofolio_tag', 'portofolio_id', 'tag_id')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function getImageUrlAttribute()
    {
        return $this->Image ? asset('storage/' . $this->Image) : null;
    }

    public function getStatusLabelAttribute()
    {
        return $this->Status === 'active' ? 'Active' : 'Inactive';
    }

    public function getVisibilityLabelAttribute()
    {
        return $this->Visibility === 'public' ? 'Public' : 'Private';
    }

    public function scopeActive($query)
    {
        return $query->where('Status', 'active');
    }

    public function scopePublic($query)
    {
        return $query->where('Visibility', 'public');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('Category', $category);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->where('Name', 'like', '%' . $searchTerm . '%')
                ->orWhere('Title', 'like', '%' . $searchTerm . '%')
                ->orWhere('Description', 'like', '%' . $searchTerm . '%');
        });
    }


}
