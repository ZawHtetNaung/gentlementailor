<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texture extends Model
{
    //
    protected $fillable = [
        'threating','warm_rating','cool_rating','main_texture_id','sub_category_id','photo_one','photo_two','photo_three','photo_four','photo_five','photo_six','photo_seven','photo_eight','photo_nine','photo_ten','name','price','made_in','composition','color_id','softness','popular_count','description','pattern_id','package_id'
    ];
    public function main_texture() {
        return $this->belongsTo('App\MainTexture','main_texture_id');
    }

    public function sub_category() {
        return $this->belongsTo('App\TextureSubCategory','sub_category_id');
    }

    public function color() {
        return $this->belongsTo('App\Color','color_id');
    }
}
