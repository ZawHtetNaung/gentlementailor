<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpperMeasurement extends Model
{
    //
    protected $fillable = [
      'user_id',
      'stomach',
      'biceps',
      'forearm',
      'cuffs',
      'chest_front_width',
      'chest_back_width',
      'jacket_front_length',
      'chest',
      'waist',
      'hips',
      'shoulder',
      'sleeve_length_right',
      'sleeve_length_left',
      'vest_length',
      'jacket_back_length',
      'neck',
      'measure_type',
  ];
  public function user() {
    return $this->belongsTo('App\User','user_id');
  }
  public function top() {
    return $this->belongsTo('App\Top','top_id');
  }
}

