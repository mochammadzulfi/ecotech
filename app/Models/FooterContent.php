<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    protected $fillable = [
        'about_id',
        'about_en',
        'company_name',
        'email',
        'phone',
        'address_id',
        'address_en'
    ];
}
