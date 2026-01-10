<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Service.php
class Service extends Model
{
    protected $fillable = [
        'slug',
        'title_id',
        'title_en',
        'short_desc_id',
        'short_desc_en',
        'content_id',
        'content_en',
        'image',
        'icon'
    ];
}
