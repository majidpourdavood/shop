<?php

namespace App;

use App\Model\Ticket;
use App\Model\TicketMessage;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'lastName',
        'code',
        'mobile',
        'expireCode',
        'step',

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function charts()
    {
        return $this->belongsToMany(Chart::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function ticketMessages()
    {
        return $this->hasMany(TicketMessage::class);
    }
    public function shops()
    {
        return $this->hasMany(Shop::class, 'user_id');
    }

    public function ibans()
    {
        return $this->hasMany(Iban::class, 'user_id');
    }

}
