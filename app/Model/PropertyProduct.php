<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropertyProduct extends Model
{
    protected $fillable = [
        'value',
        'property_id',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function keyValue()
    {
        return $this->belongsTo(KeyValue::class);
    }

    public function optionProperty()
    {
        return $this->belongsTo(OptionProperty::class);
    }


}
