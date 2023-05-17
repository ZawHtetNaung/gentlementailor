<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $fillable = [
        'photo','title','description','made_in','tailor','price','link'
    ];
}
