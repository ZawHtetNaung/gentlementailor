<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    //
    protected $fillable = [
      'user_id',
      'order_code',
      'total',
      'total_qty',
      'address'
    ];
    public function user() {
      return $this->belongsTo('App\User','user_id');
    }
}
