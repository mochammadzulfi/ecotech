<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'hero_title_id',
        'hero_title_en',
        'hero_subtitle_id',
        'hero_subtitle_en',
        'hero_image',
    ];
}
