<?php

namespace App\Model;

use App\Discount;
use App\Rating;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'body',
        'slug',
        'images',
        'price',
        'cate_id',
        'active',
        'meta_description',
        'details',
    ];
    protected $casts = [
        'images' => 'array',
        'details' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function propertyProducts()
    {
        return $this->hasMany(PropertyProduct::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

}
