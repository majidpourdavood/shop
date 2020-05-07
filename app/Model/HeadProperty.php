<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HeadProperty extends Model
{
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
