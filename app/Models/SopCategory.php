<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SopCategory extends Model
{
    /** @use HasFactory<\Database\Factories\SopCategoryFactory> */
    use HasFactory;
    protected $table = 'sop_categories';
    protected $fillable = [
        'categoryName',
        'details',
        'lab_id', // Foreign key to labs table
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    public function sops()
    {
        return $this->hasMany(Sop::class, 'sop_category_id');
    }


}
