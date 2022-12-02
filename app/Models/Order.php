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

    public function getStatusNameAttribute($value)
    {
        switch($this->status) {
            case 1:
                return 'New Order';
                break;
            case 2:
                return 'Payment Success';
                break;
            case 3:
                return 'Order Process';
                break;
            case 4:
                return 'Order Completed';
                break;
            case 5:
                return 'Orderr Cancel';
                break;
            case 6:
                return 'Payment Pending';
                break;
            case 7:
                return 'Payment Failed';
                break;
        }
        
    }

    public function getFieldNameAttribute($value)
    {
        return [
            [
                'column' => 'invoice_id',
                'name' => 'Invoice',
            ],
            [
                'column' => 'name',
                'name' => 'Customer',
            ],
            [
                'column' => 'phone',
                'name' => 'Phone',
            ],
            [
                'column' => 'address',
                'name' => 'Alamat',
            ],
            [
                'column' => 'kelurahan',
                'name' => 'Kelurahan',
            ],
            [
                'column' => 'kecamatan',
                'name' => 'Kecamatan',
            ],
            [
                'column' => 'kota',
                'name' => 'Kota',
            ],
            [
                'column' => 'provinsi',
                'name' => 'Provinsi',
            ],
            [
                'column' => 'agent_name',
                'name' => 'Agen',
            ],
            [
                'column' => 'payment_method',
                'name' => 'Metode Pembayaran',
            ],
            [
                'column' => 'payment_date',
                'name' => 'Tanggal Pembayaran',
            ],
            [
                'column' => 'payment_final',
                'name' => 'Total Pembayaran',
            ],
        ];
    }
}
