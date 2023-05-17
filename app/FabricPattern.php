<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricPattern extends Model
{
    //
    protected $fillable = [
      'main_texture_id','sub_category_id','name'
  ];
  public function main_texture() {
    return $this->belongsTo('App\MainTexture','main_texture_id');
  }

  public function sub_category() {
      return $this->belongsTo('App\TextureSubCategory','sub_category_id');
  }
}
