<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartOrderProduct extends Model
{
    //
    protected $fillable = [
      'cart_order_id',
      'order_code',
      'user_id',
      'item_id',
      'item_name',
      'photo',
      'price',
      'current_qty',
      'qty',
      'each_sub',
      'type',
    ];
    
    public function additional() {
      return $this->belongsTo('App\Additional','item_id');
    }
    public function ready() {
      return $this->belongsTo('App\ReadyToWear','item_id');
    }


}

