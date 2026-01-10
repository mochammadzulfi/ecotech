<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHeader extends Model
{
    protected $fillable = [
        'page',
        'title_id',
        'title_en',
        'subtitle_id',
        'subtitle_en',
        'background_image',

        'btn_primary_text_id',
        'btn_primary_text_en',
        'btn_primary_url',
        'btn_secondary_text_id',
        'btn_secondary_text_en',
        'btn_secondary_url',
    ];
}
