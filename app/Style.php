<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    //
    protected $fillable = [
        'photo_one','photo_two','photo_three','photo_four','photo_five','photo_six','photo_seven','photo_eight','photo_nine','photo_ten','type','category','name',
        'colour','fabric','fabric_type','compostition','softness','description','pieces','type_id'
    ];
}
