<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeFilter($query)
    {

        $title = request('title');
        if (isset($title) && trim($title) != '') {
            $query->where('title', 'like', '%' . $title . '%');
        }

    }
}
