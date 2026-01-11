<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['slug', 'name_id', 'name_en'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
