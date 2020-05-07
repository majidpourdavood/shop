<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'code',
        'status',
        'type', //withdrawal, deposit
        'amount',
        'body',
    ];

    protected $casts = [
        'body' => 'array',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
