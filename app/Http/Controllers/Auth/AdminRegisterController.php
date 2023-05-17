<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class AdminRegisterController extends Controller
{
    //
    use RegistersUsers;

    // public function __construct()
    // {
    //     $this->middleware('guest:admin');
    // }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:50', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // public function editvalidator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:50'],
    //         'email' => ['required', 'string', 'email', 'max:50'],
    //         'current_password' => ['required', new MatchOldPassword],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    protected function create()
    {
        return view('auth.admin.register');
    }

    protected function store(Request $request)
    {
        $valid=$this->validator($request->except('_token'));
        if( $valid->fails())
        {   
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = $request->except("_token");
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Auth::guard('admin')->logout();
        // if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            
        //     if(Auth::guard('admin')->check()){
        //        if( Auth::guard('admin')->user()->role == 0 || Auth::guard('super_admin')->user()->role == 1){
                   return redirect()->route('admin_register_list');
            //    }else{
            //        return redirect()->back()->with('message','Login Fail');
            //    }
            // }
    //    }else{
    //        return redirect()->back()->with('message','Login Fail');
    //    }

    }

    public function update_admin_list(Request $request,$id)
    {   
        
        // $valid=$this->editvalidator($request->except('_token'));
       
        
            // return dd("yo");
        
        $update_admin = $request->except("_token");
        $update_admin = Admin::findOrFail($id);
        if($request->current_password || $request->password || $request->confirm_password){
            $request->validate([
                'current_password' => ['required','min:8', new MatchOldPassword],

                'password' => ['required','min:8','different:current_password'],
    
                'password_confirmation' => ['same:password'],
            ]);
            $update_admin->password = Hash::make($request->new_password);
            
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255',
                Rule::unique('admins')->ignore($update_admin->id),
            ],
                'name' => ['required', 'string', 'max:255'],
            ]);
        }
        
        $update_admin->name = $request->name;
        $update_admin->email = $request->email;
        $update_admin->password = Hash::make($request->password);
        $result = $update_admin->update();
        // dd($update_admin);
        // Auth::guard('admin')->logout();
        // if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            
        //     if(Auth::guard('admin')->check()){
        //        if( Auth::guard('admin')->user()->role == 0 || Auth::guard('super_admin')->user()->role == 1){
            if($result){
                   return redirect()->route('admin_register_list');
                   Session::flash('message', 'Your admin was successfully updated');
            }
            //    }else{
            //        return redirect()->back()->with('message','Login Fail');
            //    }
            // }
    //    }else{
    //        return redirect()->back()->with('message','Login Fail');
    //    }

    }

    public function delete_admin_list(Request $request)
    {
        $delete_admin = Admin::find($request->admin_id);
        // dd($delete_admin);
        $delete_admin->delete();
        return response()->json("success");

    }

}
