<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRegister extends Model
{
    //
    protected $fillable = [
        'name','email', 'password'
    ];
}
