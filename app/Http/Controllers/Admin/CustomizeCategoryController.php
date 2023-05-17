<?php

namespace App\Http\Controllers\Admin;

use App\CustomizeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class CustomizeCategoryController extends Controller
{
    //
    public function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => ['required','mimes:jpeg,bmp,png,jpg'],
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function updatevalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
        ]);
    }

    public function show_customize_category_list()
    {
      $cates = CustomizeCategory::all();
      return view('admin.customize_category.list',compact('cates'));
    }
    public function add_customize_category_data()
    {
      return view('admin.customize_category.create');
    }
    public function store_customize_category_data(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'photo' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('add_customize_category')
                      ->withErrors($validator)
                      ->withInput();
      }
      if($request->file('photo'))
      {
        // dd("okok");

          $manager = new ImageManager(['driver' => 'imagick']);
          $photo = $request->photo->hashName();
          $path = 'assets/images/customize_category/'. $photo;
          $manager->make($request->photo)
          ->resize(376,410)
          ->save(public_path($path));

        // $photo = $request->photo;
        // $name = $photo->getClientOriginalName();
        // $photo->move(public_path() . '/assets/images/customize_category/', $name);
        // $photo = $name;
      }
      CustomizeCategory::create([
        'name' => $request->name,
        'file' => $photo
      ]);
      return redirect()->route('customize_category_list')->with('success','Your Customize Category is successfully Created');
    }

    public function delete_customize_cate(Request $request)
    {
        $delete_customize_cate = CustomizeCategory::find($request->customize_category_id);
        $delete_customize_cate->delete();
        return response()->json("success");
    }
    public function edit_customize_cate($id){
      $customize_cate = CustomizeCategory::findOrFail($id);
      return view('admin.customize_category.edit',compact('customize_cate'));
  }
  function update_customize_cate_list(Request $request,$id)
  {
      // dd($request->id);
      $valid=$this->updatevalidator($request->except('_token'));
      if( $valid->fails())
      {
          return redirect()->back()->withErrors($valid)->withInput();
      }
      $update_customize_cate = CustomizeCategory::findOrFail($id);
      // dd($request->all());

      // dd($photo);

      $update_customize_cate->name = $request->name;
      if ($request->file('file')) {

          if (File::exists(public_path($update_customize_cate->file))) {
              File::delete(public_path($update_customize_cate->file));
          }

          $photo = time() . '1.' . $request->file('file')->getClientOriginalExtension();
          $get_path = $request->file('file')->move(public_path('/assets/images/customize_category/'), $photo);
           $update_customize_cate->file = $photo;

      }
     $result = $update_customize_cate->update();
      return redirect()->route('customize_category_list')->with('success','Your Package is successfully Updated');
  }

}
