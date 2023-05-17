<?php
namespace App\Facade;
use App\Ajax;
use Illuminate\Support\Facades\Facade;

class Repair extends Facade{
    
    protected static function getFacadeAccessor()
    {
        return Ajax::class;
    }
}
