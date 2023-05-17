<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    //
    protected $fillable = [
        'main_additional_id','sub_category_id','photo_one','photo_two','photo_three','photo_four','photo_five','photo_six','photo_seven','photo_eight','photo_nine','photo_ten','name','price','made_in','composition','color_id','softness','popular_count','description','stock_qty'
    ];
    public function main_additional() {
        return $this->belongsTo('App\MainAdditional','main_additional_id');
    }

    public function sub_category() {
        return $this->belongsTo('App\AdditionalSubCategory','sub_category_id');
    }

    public function color() {
        return $this->belongsTo('App\Color','color_id');
    }
}
