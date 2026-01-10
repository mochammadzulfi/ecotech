<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Project.php
class Project extends Model
{
    protected $fillable = [
        'title_id', 'title_en',
        'category_id', 'category_en',
        'location_id', 'location_en',
        'image',
    ];
}
