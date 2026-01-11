<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'map_embed',
        'email',
        'phone',
        'address_id',
        'address_en'
    ];

    public function getAddressAttribute()
    {
        return $this->{'address_' . app()->getLocale()};
    }
}
