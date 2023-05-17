<?php

namespace App\Http\Controllers\Admin;
use App\FaqTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class FaqTitleController extends Controller
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

    public function show_faq_title_list()
    {
      $faq_titles = FaqTitle::all();
      return view('admin.faq_title.list',compact('faq_titles'));
    }
    public function add_faq_title_data()
    {
      return view('admin.faq_title.create');
    }
    public function store_faq_title_data(Request $request)
    {
      
      $validator = Validator::make($request->all(), [
        'name' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('add_faq_title')
                      ->withErrors($validator)
                      ->withInput();
      }
      FaqTitle::create([
        'name' => $request->name,
      ]);
      return redirect()->route('faq_title_list')->with('success','Your Package is successfully Created');
    }

    public function delete_faq_title(Request $request)
    {
        $delete_faq_title = FaqTitle::find($request->faq_title_id);
        $delete_faq_title->delete();
        return response()->json("success");
    }
    public function edit_faq_title($id){
      $faq_title = FaqTitle::findOrFail($id);
      return view('admin.faq_title.edit',compact('faq_title'));
  }
  function update_faq_title_list(Request $request,$id)
  {
      // dd($request->id);
      $valid=$this->updatevalidator($request->except('_token'));
      if( $valid->fails())
      {   
          return redirect()->back()->withErrors($valid)->withInput();
      }
      $update_faq_title = FaqTitle::findOrFail($id);
      // dd($request->all());
     
      // dd($photo);
      
      $update_faq_title->name = $request->name;
     $result = $update_faq_title->update();
      return redirect()->route('faq_title_list')->with('success','Your Package is successfully Updated');
  }

}
