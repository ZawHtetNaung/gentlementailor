<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    //
    protected $fillable = [
      'user_id','status','grand_id','qty','price'
  ];
}
