<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function scopeByProduct($query, $value)
    {
        return $query->whereProductId($value);
    }
}
