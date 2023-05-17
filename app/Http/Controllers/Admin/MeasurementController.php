<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\LowerMeasurement;
use App\UpperMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeasurementController extends Controller
{
    //
    public function show_upper_measure_list()
    {
      $uppers = UpperMeasurement::all();
      return view('admin.measure.upper.list',compact('uppers'));
    }
    public function show_lower_measure_list()
    {
      $lowers = LowerMeasurement::all();
      return view('admin.measure.lower.list',compact('lowers'));
    }
    public function show_personal_info_list()
    {
      $infos = User::all();
      // dd($infos);
      return view('admin.measure.personal_info.list',compact('infos'));
    }
    public function update_lower_measure_list(Request $request,$id)
    {
        // dd($request->all());
        $update = LowerMeasurement::find($id);
        // dd($update);
        // $update->waist = $request->waist;
        // $update->hips = $request->hips;
        $update->crotch = $request->crotch;
        $update->thighs = $request->thighs;
        $update->length = $request->length;
        $update->bottom = $request->bottom;
        $update->knee = $request->knee;
        // $update->shorts = $request->shorts;
        $update->stomach = $request->stomach;
        $update->save();
        return back();
    }
    public function delete_lower_measure_list(Request $request)
    {
        $delete = LowerMeasurement::find($request->lower_id);
        $delete->delete();
        return response()->json("success");
    }
    public function delete_upper_measure_list(Request $request)
    {
      // dd($request->upper_id);
        $delete = upperMeasurement::find($request->upper_id);
        $delete->delete();
        return response()->json("success");
    }

    public function delete_personalInfo_list(Request $request){
      $delete = User ::find($request->user_id);
      $delete->delete();
      return response()->json("success");
    }

    public function update_upper_measure_list(Request $request,$id)
    {
      $update = UpperMeasurement::find($id);
      $update->chest = $request->chest;
      $update->waist = $request->waist;
      $update->hips = $request->hips;
      $update->shoulder = $request->shoulder;
      $update->sleeve = $request->sleeve;
      $update->front = $request->front;
      $update->back = $request->back;
      $update->neck = $request->neck;
      $update->r_low = $request->r_low;
      $update->l_low = $request->l_low;
      $update->save();
      return back();
    }

    public function update_userinfo_measure_list(Request $request,$id)
    {
      $update = User::find($id);
      $update->age = $request->age;
      $update->weight = $request->weight;
      $update->height = $request->height;

      $update->save();
      return back();
    }

}
