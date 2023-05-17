<?php

namespace App\Http\Controllers\Frontend;
use App\Package;
use App\Order;
use App\Shipping;
use App\Style;
use App\Texture;
use App\Top;
use App\Pant;
use App\Shirt_Button;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store_order(Request $request)
    {
      logger("store order function start");
      logger($request->all());
      if($request->suit_piece == 'null')
      {
        $suit_piece = null;
      }
      else
      {
        $suit_piece = $request->suit_piece;
      }
      if($request->cus_cate_id == 1 || $request->cus_cate_id == 2)
      {
        logger("one");
        $upperMeasure_id = $request->upper_id;
        $lowerMeasure_id = null;
      }
      elseif($request->cus_cate_id == 3)
      {
        logger("two");
        $upperMeasure_id = null;
        $lowerMeasure_id = $request->lower_id;
      }
      elseif($request->cus_cate_id == 9)
      {
        logger("three");
        $upperMeasure_id = $request->upper_id;
        $lowerMeasure_id = $request->lower_id;
      }
      else
      {
        logger("four");
        $upperMeasure_id = $request->upper_id;
        $lowerMeasure_id = $request->lower_id;
      }
      // logger($request->all());
      if($request->order_id == "start")
      {
        logger("new");
        $date = date('Y-m-d');
        $package = Package::find($request->package_id);
        $suit_total = $request->total_price;
        $total = $suit_total + 2;

        $order = Order::create([
          'cus_cate_id' => $request->cus_cate_id,
          'package_id' => $request->package_id,
          'style_id' => $request->style_id,
          'upper_measure_id' => $upperMeasure_id,
          'lower_measure_id' => $lowerMeasure_id,
          'suit_total' => $suit_total,
          'total' => $total,
          'pant_id' => $request->pant_id,
          'jacket_id' => $request->jacket_id,
          'vest_id' => $request->vest_id,
          'fitting' => $request->fitting,
          'texture_id' => $request->texture_id,
          'user_id' => $request->user_id,
          'address' => $request->address,
          'suit_code' => $request->suit_code,
          'suit_piece' => $suit_piece,
          'jacket_in' => $request->jacket_in,
          'vest_in' => $request->vest_in,
          'pant_in' => $request->pant_in,
          'measure_type' => $request->measure_type,
          'status' => 0
        ]);
        $order_code = $date."-".$order->id;
        $order_code_store = Order::find($order->id);
        $order_code_store->order_code = $order_code;
        $order_code_store->save();
        return response()->json([
          "order" => $order_code_store
        ]);
      }
      else
      {
        logger("update order");
        logger($request->all());
        logger($request->cus_cate_id);
        $package = Package::find($request->package_id);
        logger("package price = ".$package->price);
        $suit_total = $request->total_price;
        $total = $suit_total + 2;
        $order = Order::find($request->order_id);
        logger($order);
        $order->cus_cate_id = $request->cus_cate_id;
        $order->package_id = $request->package_id;
        $order->style_id = $request->style_id;
        $order->upper_measure_id = $upperMeasure_id;
        $order->lower_measure_id = $lowerMeasure_id;
        $order->suit_total = $suit_total;
        $order->jacket_id = $request->jacket_id;
        $order->pant_id = $request->pant_id;
        $order->fitting = $request->fitting;
        $order->texture_id = $request->texture_id;
        $order->total = $total;
        $order->user_id = $request->user_id;
        $order->address = $request->address;

        $order->suit_code = $request->suit_code;
        $order->suit_piece = $request->suit_piece;
        $order->jacket_in = $request->jacket_in;
        $order->vest_in = $request->vest_in;
        $order->pant_in = $request->pant_in;
        $order->measure_type = $request->measure_type;
        $order->vest_id = $request->vest_id;

        $order->status = 0;
        $order->save();
        return response()->json([
          "order" => $order
        ]);
      }

    }
    public function store_order_address(Request $request)
    {
        // $order = Order::find($request->order_id);
        // $order->address = $request->address;
        // $order->save();
        return response()->json("success");
    }
    public function update_order_shipping(Request $request)
    {

      $shipping = Shipping::find($request->shipping_id);




      return response()->json([
        'shipping' => $shipping,


      ]);
    }
    public function get_order_summary_all(Request $request)
    {
      if(isset($request->package_id))
      {
        $package_name = Package::find($request->package_id)->title;
        // $package_name = $package->title;
      }
      else
      {
        $package_name = null;
      }

      if(isset($request->style_id))
      {
        $style_name = Style::find($request->style_id)->name;
      }
      else
      {
        $style_name = null;
      }

      if(isset($request->texture_id))
      {
        $texture_name = Texture::find($request->texture_id)->name;
      }
      else
      {
        $texture_name = null;
      }

      if(isset($request->jacket_id))
      {
        $jacket_name = Top::find($request->jacket_id)->style;
      }
      else
      {
        $jacket_name = null;
      }

      if(isset($request->vest_id))
      {
        $vest_name = Shirt_Button::find($request->vest_id)->style;
      }
      else
      {
        $vest_name = null;
      }

      if(isset($request->pant_id))
      {
        $pant_name = Pant::find($request->pant_id)->style;
      }
      else
      {
        $pant_name = null;
      }
      return response()->json([
        'package_name' => $package_name,
        'style_name' => $style_name,
        'texture_name' => $texture_name,
        'jacket_name' => $jacket_name,
        'vest_name' => $vest_name,
        'pant_name' => $pant_name
      ]);
    }
}


