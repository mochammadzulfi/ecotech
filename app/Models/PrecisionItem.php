<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecisionItem extends Model
{
    protected $fillable = [
        'precision_section_id',
        'label_id',
        'label_en',
    ];

    public function section()
    {
        return $this->belongsTo(PrecisionSection::class);
    }
}
