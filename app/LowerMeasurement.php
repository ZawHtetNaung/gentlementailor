<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LowerMeasurement extends Model
{
    //
    protected $fillable = [
      'user_id',
      'waist',
      'stomach',
      'hips',
      'crotch',
      'thighs',
      'knees',
      'calf',
      'shorts',
      'length',
      'bottom',
      'measure_type'
  ];
  public function user() {
    return $this->belongsTo('App\User','user_id');
  }
  public function pant() {
    return $this->belongsTo('App\Pant','pant_id');
  }
}

