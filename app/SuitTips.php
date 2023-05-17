<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuitTips extends Model
{
    //
    protected $fillable = [
        'photo','brand','title','description','feature','admin'
    ];

    protected $attributes = [
        'feature' => 'No',
    ];
}
