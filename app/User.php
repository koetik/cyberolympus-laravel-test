<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'pin',
        'phone',
        'phone_verified_at',
        'account_type',
        'account_role',
        'photo',
        'last_login',
        'password_reset_code',
        'device_token',
        'account_status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Models\Customer::class, 'id');
    }

    public function agent()
    {
        return $this->hasOne(Models\Agent::class, 'id');
    }

    public function customerOrder()
    {
        return $this->hasMany(Models\Order::class, 'customer_id');
    }

    public function agentOrder()
    {
        return $this->hasMany(Models\Order::class, 'agent_id');
    }

    public function getFullNameAttribute($value)
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
