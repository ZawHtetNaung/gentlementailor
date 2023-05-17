<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryCustomizeStepData extends Model
{
    //
    protected $fillable = [
      'temporary_id',
      'user_id',
      'customize_category_id',
      'package_id',
      'style_id',
      'style_name',
      'fitting',
      'texture_id',
      'jacket_id',
      'vest_id',
      'pant_id',

      'order_id',
      'style_cate_id',
      'style_cate_name',
      'measured',
      'suit_piece',
      'jacket_in',
      'vest_in',
      'pant_in',
      'package_price',
      'texture_price',
      'cus_total_price',
      'suit_code',
      'shipping_id',
      'shipping_price',
      'jacket_price',
      'vest_price',
      'pant_price',

      'shipping_id',
      'upper_measure_unit',
      'lower_measure_unit'
  ];
}
