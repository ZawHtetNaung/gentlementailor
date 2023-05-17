<?php

namespace App\Http\Controllers\Admin;
use App\Jacket_button;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class Jacket_buttonController extends Controller
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

    public function show_jacket_button_list()
    {
      $jacket_buttons = Jacket_Button::all();
      return view('admin.jacket_button.list',compact('jacket_buttons'));
    }
    public function add_jacket_button_data()
    {
      return view('admin.jacket_button.create');
    }
    public function store_jacket_button_data(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('add_jacket_button')
                      ->withErrors($validator)
                      ->withInput();
      }
      Jacket_Button::create([
        'name' => $request->name,
      ]);
      return redirect()->route('jacket_button_list')->with('success','Your Package is successfully Created');
    }

    public function delete_jacket_button(Request $request)
    {
        $delete_jacket_button = Jacket_Button::find($request->jacket_button_id);
        $delete_jacket_button->delete();
        return response()->json("success");
    }
    public function edit_jacket_button($id){
      $jacket_button = Jacket_Button::findOrFail($id);
      return view('admin.jacket_button.edit',compact('jacket_button'));
  }
  function update_jacket_button_list(Request $request,$id)
  {
      // dd($request->id);
      $valid=$this->updatevalidator($request->except('_token'));
      if( $valid->fails())
      {   
          return redirect()->back()->withErrors($valid)->withInput();
      }
      $update_jacket_button = Jacket_Button::findOrFail($id);
      // dd($request->all());
     
      // dd($photo);
      
      $update_jacket_button->name = $request->name;
     $result = $update_jacket_button->update();
      return redirect()->route('jacket_button_list')->with('success','Your Package is successfully Updated');
  }

}
