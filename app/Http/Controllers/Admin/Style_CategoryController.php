<?php

namespace App\Http\Controllers\Admin;

use App\Style_Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Style_categoryController extends Controller
{
    //
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50', 'unique:style__categories'],
        ]);
    }

    public function updatevalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50', 'unique:style__categories'],
        ]);
    }

    public function show_style_category_list()
    {
      $cates = Style_Category::all();
      return view('admin.style_category.list',compact('cates'));
    }
    public function add_style_category_data()
    {
      return view('admin.style_category.create');
    }
    public function store_style_category_data(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:50', 'unique:style__categories'],
      ]);
      if ($validator->fails()) {
          return redirect('add_style_category')
                      ->withErrors($validator)
                      ->withInput();
      }
      Style_Category::create([
        'name' => $request->name,
      ]);
      return redirect()->route('style_category_list')->with('success','Your Package is successfully Created');
    }

    public function delete_style_cate(Request $request)
    {
        $delete_style_cate = Style_Category::find($request->style_category_id);
        $delete_style_cate->delete();
        return response()->json("success");
    }
    public function edit_style_cate($id){
      $style_cate = Style_Category::findOrFail($id);
      return view('admin.style_category.edit',compact('style_cate'));
  }
  function update_style_cate_list(Request $request,$id)
  {
      // dd($request->id);
   
      $update_style_cate = $request->except("_token");
      $update_style_cate = Style_Category::findOrFail($id);
      $request->validate([
        'name' => ['required', 'string','max:255',
        Rule::unique('style__categories')->ignore($update_style_cate->id),
    ],
  ]);
      // dd($request->all());
     
      // dd($photo);
      
      $update_style_cate->name = $request->name;
     $result = $update_style_cate->update();
      return redirect()->route('style_category_list')->with('success','Your Package is successfully Updated');
  }

}
