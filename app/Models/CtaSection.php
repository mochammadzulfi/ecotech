<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CtaSection extends Model
{
    protected $fillable = [
        'title_id',
        'title_en',
        'desc_id',
        'desc_en',
        'btn_primary_id',
        'btn_primary_en',
        'btn_secondary_id',
        'btn_secondary_en',
    ];
}
