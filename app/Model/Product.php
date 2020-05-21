<?php

namespace App\Model;

use App\Discount;
use App\Rating;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function scopeFilter($query)
    {

        $title = request('title');
        if (isset($title) && trim($title) != '') {
            $query->where('title', 'like', '%' . $title . '%');
        }

        $type_page = request('type_page');
        if (isset($type_page) && trim($type_page) != '') {
            if ($type_page == 'new') {
                $query->orderBy('created_at', 'desc');
            } else if ($type_page = 'visit') {
//                $query->where('viewCount', 'desc');
//                $query->orderBy(DB::raw('COUNT(products.viewCount)', 'desc'));
                $query->orderBy('viewCount' , 'desc');
            }
        }

    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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
