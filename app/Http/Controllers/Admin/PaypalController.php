<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Payment;
use App\CartOrder;
use App\CartOrderProduct;
use App\LowerMeasurement;
use App\UpperMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaypalController extends Controller
{
 
    //
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(),true);
        logger($data);

        if($data['cart'] != 1){
          $upper = UpperMeasurement::where('user_id',$data['user_id'])->first();

          if($upper != null){
            $upper_id = $upper->id;
          }else{
            $upper_id = null;
          }

          $lower = LowerMeasurement::where('user_id',$data['user_id'])->first();
          if($lower != null){
            $lower_id = $lower->id;
          }else{
            $lower_id = null;
          }


          $date = date('Y-m-d');

          $store_order = Order::create([
            'user_id' => $data['user_id'],
            'address' => $data['address'],
            'suit_code' => $data['suit_code'],
            'cus_cate_id' => $data['cus_cate_id'],
            'package_id' => $data['package_id'],
            'style_id' => $data['style_id'],
            'pant_id' => $data['pant_id'],
            'jacket_id' => $data['jacket_id'],
            'fitting' => $data['fitting'],
            'vest_id' => $data['vest_id'],
            'texture_id' => $data['texture_id'],
            'upper_measure_id' => $upper_id,
            'lower_measure_id' => $lower_id,
            'suit_piece' => $data['suit_piece'],
            'jacket_in' => $data['jacket_in'],
            'vest_in' => $data['vest_in'],
            'pant_in' => $data['pant_in'],
            'shipping_id' => $data['shipping_id'],
            'shipping_price' => $data['shipping_price'],
            'suit_total' => $data['suit_total'],
            'status' => 0,
          ]);

          $store_order->order_code = $date . "-" . $store_order->id;
          $total = $store_order->suit_total + $store_order->shipping_price + 2;
          $store_order->total = $total;
          $store_order->save();

        }elseif($data['cart'] == 1){
          logger("from cart");
          $total = $data['value'];
        } // not cart id 0

        logger("end -----------------------------");

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $order = $provider->createOrder([
          "intent" => "CAPTURE",
          "purchase_units" => [
            [
              "amount" => [
                "currency_code" => "USD",
                "value" => $total
              ],
              "description" => "success Payment first step!"
            ]
          ]
        ]);

        if($data['cart'] != 1){
          $store_order->paypal_order_id =  $order['id'];
          $store_order->update();

        }

        if($data['cart'] == 1){
          $total_str = json_encode($data['grand_total']);
          $total_arr = json_decode($total_str);
          logger($total_arr);
          $item_str = json_encode($data['cart_item']);
          $item_arr = json_decode($item_str);
          foreach($total_arr as $total)
          {
              $date = date('Y-m-d');
              if($total->id == $data['user_id']){
                logger("tzl ". $total->id);
                $cart_order = CartOrder::create([
                  'user_id' => $total->id,
                  'total' => $total->sub_total,
                  'total_qty' => $total->total_qty,
                  'address' => $data['address']
                ]);

                $cart_order->order_code = $order['id'];
                $cart_order->save();
            }
          }

          logger('pass cartorder');

          logger('------------------------------------------------------------------');

          logger( $item_arr);

          foreach($item_arr as $item)
          {
            if($item->id == $data['user_id'])
            {
              CartOrderProduct::create([
                'cart_order_id' => $cart_order->id,
                'order_code' => $order['id'],
                'user_id'  => $item->id,
                'item_id' => $item->item_id,
                'item_name' => $item->item_name,
                'photo' => $item->photo,
                'price' => $item->price,
                'current_qty' => 1,
                'type' => $item->type,
                'qty' => $item->qty,
                'each_sub' => $item->each_sub
              ]);
            }
          }
        }

        if($data['cart'] == 1){
          return response()->json([
            "payorder" => $order,
            "cart_order_id" => $cart_order->id
          ]);
        }else{
          return response()->json([
            "payorder" => $order,
          ]);
        }
    }

    public function processTransaction(Request $request){

      $data = json_decode($request->getContent(),true);
      logger($data);
      logger("-------data");
      $orderId = $data['orderId'];
      logger('ProcessTransaction --------------------------------');
      logger($data);

      $provider = \PayPal::setProvider();
      $provider->setApiCredentials(config('paypal'));
      $token = $provider->getAccessToken();
      $provider->setAccessToken($token);

      $result = $provider->capturePaymentOrder($request->orderId);


      /***
       * 
       *  @ Insert To Payment table
       * 
       */
      Payment::create([
        'order_id' => $request->orderId,
        'pay_name' => $result['purchase_units'][0]['shipping']['name']['full_name'],
        'payer_email' => $result['payment_source']['paypal']['email_address'],
        'amount' => $result['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['gross_amount']['value'],
        'currency' => $result['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
        'paypal_fee' => $result['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'],
        'net_amount' => $result['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'],
        'status' => $result['purchase_units'][0]['payments']['captures'][0]['status'],
        'order_status' => 'PENDING',
        'tran_id' => $orderId,
        'account_id' => $result['payment_source']['paypal']['account_id']

      ]);

      return response()->json($result);
    }


}
