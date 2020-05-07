<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title',
        'type',
        'file',
        'code',
        'user_id',
        'fileable_id',
        'fileable_type'
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
