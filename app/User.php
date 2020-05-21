<?php

namespace App;

use App\Model\Address;
use App\Model\ItemOrder;
use App\Model\Order;
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


    public function charts()
    {
        return $this->belongsToMany(Chart::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function item_orders()
    {
        return $this->hasMany(ItemOrder::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }


}
