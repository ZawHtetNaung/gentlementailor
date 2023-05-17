<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'code', 'category_name', 'main_status','photo'
    ];
}
