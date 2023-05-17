<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadyToWear extends Model
{
    //
    protected $fillable = [
      'name',
      'price',
      'texture_id',
      'style_id',
      'package_id',
      'photo_one',
      'photo_two',
      'photo_three',
      'photo_four',
      'photo_five',
      'description',
      'main_texture_id',
      'sub_texture_id',
      'stock_qty',
      'popular_count',
      'made_in',
      'composition',
      'softness'
    ];
    public function main_texture() {
      return $this->belongsTo('App\MainTexture','main_texture_id');
  }

  public function sub_category() {
      return $this->belongsTo('App\TextureSubCategory','sub_texture_id');
  }

  public function package() {
    return $this->belongsTo('App\Package','package_id');
}
public function style() {
  return $this->belongsTo('App\Style','style_id');
}
public function grand() {
  return $this->belongsTo('App\Texture','texture_id');
}
}

