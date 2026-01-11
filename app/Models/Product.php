<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'slug',
        'name_id',
        'name_en',
        'short_desc_id',
        'short_desc_en',
        'image',
        'capacity',
        'pressure',
        'is_featured'
    ];

    protected $casts = [
        'specs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
