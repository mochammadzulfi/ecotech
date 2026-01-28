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
        'specs',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'specs' => 'array',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function getShortDescAttribute()
    {
        return $this->{'short_desc_' . app()->getLocale()};
    }
}

