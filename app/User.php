<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','age','weight','height_ft','height_in','weight_type','phone','dob','gender','city','tsp_street',
        'shoulder_type',
        'drop_shoulder',
        'arms_position',
        'body_shape',
        'neck_type',
        'stomach_shape',
        'upper_body_shape',
        'pant_line',
        'seat',
        'height_cm',
        'height_ft',
        'height_in'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
