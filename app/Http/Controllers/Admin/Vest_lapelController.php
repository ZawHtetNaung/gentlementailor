<?php

namespace App\Http\Controllers\Admin; 

use App\Vest_lapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Vest_lapelController extends Controller
{
    //
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
    
        public function show_vest_lapel_list()
        {
          $vest_lapels = Vest_lapel::all();
          return view('admin.vest_lapel.list',compact('vest_lapels'));
        }
        public function add_vest_lapel_data()
        {
          return view('admin.vest_lapel.create');
        }
        public function store_vest_lapel_data(Request $request)
        {
          $validator = Validator::make($request->all(), [
            'name' => 'required',
          ]);
          if ($validator->fails()) {
              return redirect('add_jacket_button')
                          ->withErrors($validator)
                          ->withInput();
          }
          Vest_lapel::create([
            'name' => $request->name,
          ]);
          return redirect()->route('vest_lapel_list')->with('success','Your Package is successfully Created');
        }
    
        public function delete_vest_lapel(Request $request)
        {
            $delete_vest_lapel = Vest_lapel::find($request->vest_lapel_id);
            $delete_vest_lapel->delete();
            return response()->json("success");
        }
        public function edit_vest_lapel($id){
          $vest_lapel = Vest_lapel::findOrFail($id);
          return view('admin.vest_lapel.edit',compact('vest_lapel'));
      }
      function update_vest_lapel_list(Request $request,$id)
      {
          // dd($request->id);
          $valid=$this->updatevalidator($request->except('_token'));
          if( $valid->fails())
          {   
              return redirect()->back()->withErrors($valid)->withInput();
          }
          $update_vest_lapel = Vest_lapel::findOrFail($id);
          // dd($request->all());
         
          // dd($photo);
          
          $update_vest_lapel->name = $request->name;
         $result = $update_vest_lapel->update();
          return redirect()->route('vest_lapel_list')->with('success','Your Package is successfully Updated');
      }
}
