<?php


namespace App\Helpers;
use Request;
use App\Shopowner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\RegisterLog as RegisterLogModel;


class RegisterLog
{


    public static function RegisterLog($user)
    {
        // return dd($user);
    	$log = [];
    // 	$itemid = $item->id;
    //   	return dd($item);
        // $log['item_id'] = $item->	id;
        // $log['shop_id'] = $item->	shop_id;
    	// $log['item_code'] = $item->	product_code;
        // $log['name'] = $item->name;
    
        $log['name'] =  $user['name'];
        $log['email'] =  $user['email'];
     
    	
       
    	RegisterLogModel::create($log);
    }





  


}
