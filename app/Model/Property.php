<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'key',
        'type',
        'cate_id',
        'show_place',
        'head_property_id',
    ];

//    protected $casts = [
//        'details' => 'array',
//    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'cate_id' );
    }

    public function optionProperty()
    {
        return $this->hasMany(OptionProperty::class);
    }

    public function propertyProduct()
    {
        return $this->hasOne(PropertyProduct::class);
    }
}
