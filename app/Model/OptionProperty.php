<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OptionProperty extends Model
{
    protected $fillable = [
        'value',
        'status',
        'property_id',
    ];

//    protected $casts = [
//        'value' => 'array',
//    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
