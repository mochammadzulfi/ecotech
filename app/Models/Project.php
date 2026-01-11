<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Project.php
class Project extends Model
{
    protected $fillable = [
        'slug',
        'title_id',
        'title_en',
        'project_category_id',
        'location_id',
        'location_en',
        'image',
        'short_desc_id',
        'short_desc_en',
        'excerpt_id',
        'excerpt_en',
    ];

    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }

    public function getLocationAttribute()
    {
        return $this->{'location_' . app()->getLocale()};
    }

    public function getExcerptAttribute()
    {
        return $this->{'excerpt_' . app()->getLocale()};
    }

    public function getShortDescAttribute()
    {
        return $this->{'short_desc_' . app()->getLocale()};
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
