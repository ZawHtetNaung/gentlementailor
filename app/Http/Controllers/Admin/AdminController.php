<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Banner;
use App\Category;
use Illuminate\Support\Carbon;
use App\RegisterLog;
use App\Facade\Repair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\bannerImageRequest;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function create_banner()
    {
        return view('admin.add_banner');
    }
    
    public function store_banner_data(bannerImageRequest $request)
    {


            $folderPath = public_path().'/frontend/images/';
            $banner = new Banner();
            $banner->text = $request->text;
            $banner->button_text = $request->button_text;
            $banner->photo = Repair::encode($request->photo,$folderPath);
            $banner->save();
             return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
    public function show_banner_list()
    {
        $banners = Banner::all();
        return view('admin.banner_list',compact('banners'));
    }
    public function edit_banner_list($id){
        $banner = Banner::findOrFail($id);
        return view('admin.edit_banner',compact('banner'));
    }
    public function update_banner_list(Request $request,$id)
    {
        // dd($request->all());
        // $request->validate(
        //     [
        //         'text' => ['string', 'max:255'],
        //         'button_text' => ['string', 'max:255'],
        //         'photo' => 'mimes:jpeg,bmp,png,jpg',
        //     ]
        // );

         //remove token and method from request
        // $input = $request->except('_token', '_method');
        $folderPath = public_path().'/frontend/images/';
        $update_banner = Banner::findOrFail($id);

        $update_banner->text = $request->text;
        $update_banner->button_text = $request->button_text;
        if($request->photo){
        $update_banner->photo = Repair::encode($request->photo,$folderPath);
        }
        $updateSuccess = $update_banner->update();
        //    return dd($input['history_photo']);
        //   if($updateSuccess){
        //     Session::flash('message', 'Your admin was successfully updated');
        //     alert()->success("Successfully Updated Banner!");
        //     return redirect()->back();
        //   }else{
        //     dd("fail");
        //   }
        alert()->success("Successfully Updated Banner!");
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
    public function delete_banner_list(Request $request)
    {
        $delete_banner = Banner::find($request->banner_id);
        $delete_banner->delete();
        return response()->json("success");

    }
    public function create_category_data()
    {
        return view('admin.category_page');
    }
    public function store_category_data(Request $request)
    {
        // dd($request->all());
        if ($request->hasfile('photo')) {

            $photo = $request->file('photo');

            $name = $photo->getClientOriginalName();

            $photo->move(public_path() . '/frontend/images/', $name);

            $photo = $name;
        }
        if($request->main_status)
        {
            $main = 1;
        }
        else
        {
            $main = 0;
        }
        Category::create([
            'code' => $request->code,
            'category_name' => $request->name,
            'main_status' => $main,
            'photo' => $photo
        ]);
        alert()->success("Successfully Created Category!");
        return redirect()->route('show_category_list');
    }
    public function show_category()
    {
        $category = Category::all();
        return view('admin.category_list',compact('category'));
    }


    public function dashboard()
    {
        $register_user = RegisterLog::all();
        $register_admin = Admin::all();
        // return dd($register_user);
        return view('admin.dashboard',compact('register_user','register_admin'));
    }

    public function list_registerlog()
    {
        $register_user = RegisterLog::all();
        // return dd($register_user);
        return view('admin.list_register_logs',compact('register_user'));
    }

    public function getUserRegister(Request $request) {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $searchByFromdate = $request->get('searchByFromdate');
        $searchByTodate = $request->get('searchByTodate');
      logger($columnName);

        if($searchByFromdate == null) {
          $searchByFromdate = '0-0-0 00:00:00';
        }
        if($searchByTodate == null) {
          $searchByTodate = Carbon::now();
        }

        $totalRecords = RegisterLog::select('count(*) as allcount')
                        ->where(function ($query) use($searchValue) {
                          $query->where('name', 'like', '%' . $searchValue . '%')
                                ->orWhere('email', 'like', '%' . $searchValue . '%');
                          })
                        ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
                        ->count();
        $totalRecordswithFilter = $totalRecords;
        // $ads = RegisterLog::where('type',['shop'])->orderBy('created_at', 'desc')->get();
        $records = RegisterLog::orderBy($columnName, $columnSortOrder)
            ->orderBy('created_at', 'desc')
            ->where(function ($query) use($searchValue) {
              $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
              })
            ->whereBetween('created_at', [$searchByFromdate, $searchByTodate])
            ->select('register_logs.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();


        $data_arr = array();

        foreach ($records as $record) {
          $data_arr[] = array(
              "id" => $record->id,
              "name" => $record->name,
              "email" => $record->email,
              "created_at" => date('F d, Y ( h:i A )',strtotime($record->created_at)),
              // "created_at" => $record->created_at,
          );
        }

        $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordswithFilter,
          "aaData" => $data_arr,
        );
        echo json_encode($response);
    }

}
