<?php

namespace App\Http\Controllers\Admin;
use App\Pant_pleat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class Pant_pleatController extends Controller
{
    //
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function updatevalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function show_pant_pleat_list()
    {
      $pant_pleats = Pant_pleat::all();
      return view('admin.pant_pleat.list',compact('pant_pleats'));
    }
    public function add_pant_pleat_data()
    {
      return view('admin.pant_pleat.create');
    }
    public function store_pant_pleat_data(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('add_pant_pleat')
                      ->withErrors($validator)
                      ->withInput();
      }
      Pant_pleat::create([
        'name' => $request->name,
      ]);
      return redirect()->route('pant_pleat_list')->with('success','Your Package is successfully Created');
    }

    public function delete_pant_pleat(Request $request)
    {
        $delete_pant_pleat = Pant_pleat::find($request->pant_pleat_id);
        $delete_pant_pleat->delete();
        return response()->json("success");
    }
    public function edit_pant_pleat($id){
      $pant_pleat = Pant_pleat::findOrFail($id);
      return view('admin.pant_pleat.edit',compact('pant_pleat'));
  }
  function update_pant_pleat_list(Request $request,$id)
  {
      // dd($request->id);
      $valid=$this->updatevalidator($request->except('_token'));
      if( $valid->fails())
      {   
          return redirect()->back()->withErrors($valid)->withInput();
      }
      $update_pant_pleat = Pant_pleat::findOrFail($id);
      // dd($request->all());
     
      // dd($photo);
      
      $update_pant_pleat->name = $request->name;
     $result = $update_pant_pleat->update();
      return redirect()->route('pant_pleat_list')->with('success','Your Package is successfully Updated');
  }

}
