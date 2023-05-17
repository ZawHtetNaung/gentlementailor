<?php

namespace App\Http\Controllers\Admin;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;

class PackageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => ['required','mimes:jpeg,bmp,png,jpg'],
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required','string', 'max:2255'],
            'made_in' => ['required', 'string', 'max:50'],
            'tailor' => ['required', 'string', 'max:50'],
            'price' => ['required', 'string', 'max:50'],
            'link' => ['required'],
        ]);
    }

    public function updatevalidator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required','string', 'max:2255'],
            'made_in' => ['required', 'string', 'max:50'],
            'tailor' => ['required', 'string', 'max:50'],
            'price' => ['required', 'string', 'max:50'],
            'link' => ['required'],
        ]);
    }

    function show_package_list()
    {
        $packages = Package::all();
        return view('admin.package.list',compact('packages'));
    }

    function add_package_data()
    {
        return view('admin.package.create');
    }

    function store_package_data(Request $request)
    {
      // dd("package");
        $valid=$this->validator($request->except('_token'));
        if( $valid->fails())
        {
            return redirect()->back()->withErrors($valid)->withInput();
        }
        // dd($request->photo);
        if ($request->hasfile('photo')) {
          $manager = new ImageManager(['driver' => 'imagick']);
          $photo = $request->photo->hashName();
          $path = 'frontend/package/'. $photo;
          $manager->make($request->photo)
          ->resize(300,300)
          ->save(public_path($path));

            // old store file
            // $photo = $request->photo;
            // $name = $photo->getClientOriginalName();

            // $photo->move(public_path() . '/frontend/package/', $photo);

            // $photo = $name;
            // end old
        }
        // dd($photo);
        $package = Package::create([
            'photo' => $photo,
            'title' => $request->title,
            'description' => $request->description,
            'made_in' => $request->made_in,
            'tailor' => $request->tailor,
            'price' => $request->price,
            'link' => $request->link,
        ]);
        return redirect()->route('package_list')->with('success','Your Package is successfully Created');
    }

    function delete_package_list(Request $request)
    {
        $delete_package = Package::find($request->package_id);
        $delete_package->delete();
        return response()->json("success");
    }


    public function edit_package($id){
        $package = Package::findOrFail($id);
        return view('admin.package.edit',compact('package'));
    }
    function update_package_list(Request $request,$id)
    {
        // dd($request->id);
        $valid=$this->updatevalidator($request->except('_token'));
        if( $valid->fails())
        {
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $update_package = Package::findOrFail($id);
        // dd($request->all());

        // dd($photo);

        $update_package->title = $request->title;
        $update_package->description = $request->description;
        $update_package->made_in = $request->made_in;
        $update_package->tailor = $request->tailor;
        $update_package->price = $request->price;
        $update_package->link = $request->link;
        if ($request->file('photo')) {

            if (File::exists(public_path($update_package->photo))) {
                File::delete(public_path($update_package->photo));
            }

            $photo = time() . '1.' . $request->file('photo')->getClientOriginalExtension();
            $get_path = $request->file('photo')->move(public_path('/frontend/package'), $photo);
             $update_package->photo = $photo;

        }
       $result = $update_package->update();
        return redirect()->route('package_list')->with('success','Your Package is successfully Updated');
    }

}

