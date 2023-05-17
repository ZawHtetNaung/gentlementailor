<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'order_id',
        'pay_name',
        'payer_email',
        'amount',
        'currency',
        'status',
        'tran_id',
        'net_amount',
        'paypal_fee',
        'account_id',
        'order_status'
    ];

    public function order() {
      return $this->hasOne(Order::class,'paypal_order_id','order_id');
    }

    public function products()
    {
      return $this->hasMany(CartOrderProduct::class,'order_code','order_id');
    }

    public function cartOrder()
    {
      return $this->hasOne( CartOrder::class,'order_code','order_id');
    }

}
