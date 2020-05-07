<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $guarded = [];

    public function childs()
    {
        return $this->hasMany('App\Chart', 'parent_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function parent()
    {
        return $this->belongsTo('App\Chart', 'parent_id', 'id');
    }


}
