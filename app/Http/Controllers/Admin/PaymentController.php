<?php

namespace App\Http\Controllers\Admin;

use App\CartOrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use App\Texture;
use App\Favourite;
use App\MainTexture;
use App\TextureSubCategory;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        logger($payments);
        return view('admin.payment.list',compact('payments'));
    }

    public function order_detail($id)
    {

        $orders = Payment::where('id',$id)->with('products')->with('cartOrder')->with('order')->get();
        $customize_orders = Payment::where('id',$id)->with('order')->first();
        // return $customize_orders;
        // return $orders;
        if($customize_orders['order']){
            $orders = Payment::where('id',$id)->with('products')->with('cartOrder')->with('order')->get();
        }else{
            $orders = Payment::where('id',$id)->with('products')->with('cartOrder')->get();
        }
            return view('admin.payment.detail',compact('orders'));
    }

    public function order_deleivery_update($id)
    {
        $payment = Payment::findOrFail($id);
        if($payment->order_status === 'DELIVERIED'){
            $payment->order_status = 'PENDING';
        }else{
            $payment->order_status = 'DELIVERIED';
        }
        $payment->update();

        return redirect()->back();
    }

}
