<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Order;
use App\AddToCart;
use App\CartOrder;
use App\Favourite;
use App\CartOrderProduct;
use App\LowerMeasurement;
use App\UpperMeasurement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProfileContoller extends Controller
{
    public function user_profile()
    {
        $user = Session::get('user_id');

        $user_detail = User::find($user);

        $favs = Favourite::where('user_id',Session::get('user_id'))->get();
        $carts = AddToCart::where('user_id',Session::get('user_id'))->get();
        
        $upper = UpperMeasurement::where('user_id',$user)->first();
        $lower = LowerMeasurement::where('user_id',$user)->first();
        $cus_orders = Order::where('user_id',$user)->get();
        $cart_orders = CartOrder::where('user_id',$user)->get();
        $cart_order_products = CartOrderProduct::all();
        // dd($user_detail);
        
        return view('frontend.profile',compact('cart_order_products','favs','carts','user_detail','upper','lower','cus_orders','cart_orders'));
    }
}
