<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
        'icon',
        'title_id',
        'title_en',
        'desc_id',
        'desc_en'
    ];
}
