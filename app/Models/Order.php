<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function userCustomer()
    {
        return $this->belongsTo(\App\User::class, 'customer_id');
    }

    public function userAgent()
    {
        return $this->belongsTo(\App\User::class, 'agent_id');
    }
}
