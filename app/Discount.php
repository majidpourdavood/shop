<?php

namespace App;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'expirationDate',
        'user_id',
        'rialsPercent',
        'product_id',
        'code',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
