<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'type',
        'image',
        'active'
    ];


//    protected $casts = [
//        'list_head_property' => 'array',
//    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id' , 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'cate_id');
    }

    public function headProperties()
    {
        return $this->hasMany(HeadProperty::class, 'cate_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'cate_id');
    }

}
