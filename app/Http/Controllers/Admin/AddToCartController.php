<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\AddToCart;

class AddToCartController extends Controller
{
    //
    public function add_cart(Request $request)
    {
      // dd($request->all());
      $user_id = Session::get('user_id');
      AddToCart::create([
        'user_id' => $user_id,
        'status' => $request->status,
        'qty' => 1,
        'price' => $request->price,
        'grand_id' => $request->grand_id
      ]);
      $carts = AddToCart::where('user_id',$user_id)->get();
      $qty = count($carts);
      return response()->json([
          'cartqty' => $qty
      ]);
    }
}
