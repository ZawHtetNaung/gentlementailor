<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TemporaryCustomizeStep;
use App\TemporaryCustomizeStepData;
use App\User;

class TemporaryController extends Controller
{
    //
    public function store_customize_step_data_in(Request $request)
    {
        logger("store-------temporary-----------data--------start");
        logger($request->all());
        logger("store-------temporary-----------data--------end");
        if($request->step_no != null)
        {
          $store_step = TemporaryCustomizeStep::create([
            'user_id' => $request->user_id,
            'step' => $request->step_no,
          ]);

          TemporaryCustomizeStepData::create([
            'temporary_id' => $store_step->id,
            'user_id' => $request->user_id,
            'customize_category_id' => $request->cus_cate_id,
            'package_id' => $request->package_id,
            'style_id' => $request->style_id,
            'style_name' => $request->style_name,
            'fitting' => $request->fitting,
            'texture_id' => $request->texture_id,
            'jacket_id' => $request->jacket_id,
            'vest_id' => $request->vest_id,
            'pant_id' => $request->pant_id,
            'upper_id' => $request->upper_id,
            'lower_id' => $request->lower_id,
            'order_id' => $request->order_id,
            'style_cate_id' => $request->style_cate_id,
            'style_cate_name' => $request->style_cate_name,
            'measured' => $request->measured,
            'suit_piece' => $request->suit_piece,
            'jacket_in' => $request->jacket_in,
            'vest_in' => $request->vest_in,
            'pant_in' => $request->pant_in,
            'package_price' => $request->package_price,
            'texture_price' => $request->texture_price,
            'cus_total_price' => $request->cus_total_price,
            'shipping_id' => $request->shipping_id,
            'shipping_price' => $request->shipping_price,
            'measure_type' => $request->measure_type,
            'jacket_price' => $request->jacket_price,
            'vest_price' => $request->vest_price,
            'pant_price' => $request->pant_price,
            'measure_unit' => $request->measure_unit,
            'suit_code' => $request->suit_code,
            'upper_measure_unit' => $request->upper_measure_unit,
            'lower_measure_unit' => $request->lower_measure_unit,
          ]);
        }
        return response()->json([
          'has_step' => 'pass'
        ]);
    }
    public function update_customize_step_data_in(Request $request)
    {
      // logger("update temporary");
        // logger($request->all());
        if($request->lower_id == 'null'){
          $lower_id = null;
        }else{
          $lower_id = $request->lower_id;
        }


        if($request->upper_id == 'null')
        {
          $upper_id = null;
        } else {
          $upper_id = $request->upper_id;
        }
        $update_step = TemporaryCustomizeStep::find($request->has_step);
        // $update_step->step = 1;
        // $update_step->save();
        $update_step_data = TemporaryCustomizeStepData::where('temporary_id',$update_step->id)->first();
        $update_step_data->customize_category_id = $request->cus_cate_id;
        $update_step_data->package_id = $request->package_id;
        $update_step_data->style_id = $request->style_id;
        $update_step_data->style_name = $request->style_name;
        $update_step_data->fitting = $request->fitting;
        $update_step_data->texture_id = $request->texture_id;
        $update_step_data->jacket_id = $request->jacket_id;
        $update_step_data->vest_id = $request->vest_id;
        $update_step_data->pant_id = $request->pant_id;
        // $update_step_data->upper_id = $upper_id;
        // $update_step_data->lower_id = $lower_id;
        $update_step_data->order_id = $request->order_id;
        $update_step_data->style_cate_id = $request->style_cate_id;
        $update_step_data->style_cate_name = $request->style_cate_name;
        $update_step_data->measured = $request->measured;
        $update_step_data->suit_piece = $request->suit_piece;
        $update_step_data->jacket_in = $request->jacket_in;
        $update_step_data->vest_in = $request->vest_in;
        $update_step_data->pant_in = $request->pant_in;
        $update_step_data->package_price = $request->package_price;
        $update_step_data->texture_price = $request->texture_price;
        $update_step_data->cus_total_price = $request->cus_total_price;
        // $update_step_data->measure_type = $request->measure_type;
        $update_step_data->jacket_price = $request->jacket_price;
        $update_step_data->vest_price = $request->vest_price;
        $update_step_data->pant_price = $request->pant_price;
        $update_step_data->shipping_id = $request->shipping_id;
        $update_step_data->shipping_price = $request->shipping_price;
        $update_step_data->upper_measure_unit = $request->upper_measure_unit;
        $update_step_data->lower_measure_unit = $request->lower_measure_unit;
        $update_step_data->save();
        if($update_step_data->shipping_id != null)
        {
          $all_total = $update_step_data->cus_total_price + $update_step_data->shipping_price + 2;
        }
        else
        {
          $all_total = $update_step_data->cus_total_price + 2;
        }

        return response()->json([
          'suit_total' => $update_step_data->cus_total_price,
          'total' => $all_total
        ]);

    }

    public function get_customize_step_data_in(Request $request)
    {
      logger("Get Temporary");
      // logger($request->all());
      $get_step = TemporaryCustomizeStep::where('user_id',$request->user_id)->first();
      $get_step_data = TemporaryCustomizeStepData::where('temporary_id',$get_step->id)->first();
      $user = User::find($request->user_id);
      return response()->json([
        "get_step" => $get_step,
        "get_step_data" => $get_step_data,
        "user" => $user
      ]);
    }

    public function delete_customize_step_data_in(Request $request)
    {
      logger("delete temporary data");
        $delete_step_data = TemporaryCustomizeStepData::where('temporary_id',$request->temporary_id)->delete();
        $delete_step = TemporaryCustomizeStep::find($request->temporary_id)->delete();
        logger("success");
        return response()->json("success");
    }
    public function store_suit_code_step6_ajax_in(Request $request)
    {
      logger("store suit code-----------");
      logger($request->all());
      logger("end store suit code----------");
      $for_suit_code = TemporaryCustomizeStepData::where('user_id',$request->user_id)->first();

      if($request->suit_code == "start" || $request->suit_code == 'null')
      {
        logger("has suit code");
        $gene = random_int(1000, 9999);
        $suit_code = "SUC-".sprintf('%03s', $gene);
      $for_suit_code->suit_code = $suit_code;
      $for_suit_code->save();
      $suit_code = $for_suit_code->suit_code;
      }
      else
      {
        $suit_code = $for_suit_code->suit_code;
      }

      logger("outtttt------%%%%%@@@@");
      logger($suit_code);
      return response()->json([
        'suit_code' => $suit_code,
        'suit_total' => $for_suit_code->cus_total_price
      ]);
    }
    function store_suit_code_step6_for_guest_ajax_in()
    {
      $gene = random_int(1000, 9999);
      $suit_code = "SUC-".sprintf('%03s', $gene);
      return response()->json([
        'suit_code' => $suit_code,
      ]);
    }
}
