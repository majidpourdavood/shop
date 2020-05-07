<?php

namespace App;

use App\Model\FormTreatment;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo('App\Location', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Location', 'parent_id', 'id');
    }

    public function charts()
    {
        return $this->belongsToMany(Chart::class, 'locations_charts');
    }

    public function treatments()
    {
        return $this->hasMany(FormTreatment::class, 'location_id', 'id');
    }
}
