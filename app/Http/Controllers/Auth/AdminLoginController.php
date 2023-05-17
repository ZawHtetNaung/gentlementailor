<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    
     //    show form
     public function loginform()
     {
         return view('auth.admin.login');
     }
     //    show form

      //if user email and password is correct loginned
    public function login(Request $request)
    {
        
        $data = $request->except('_token');
        $validator= Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:50'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();

        }

        if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            
            //  if(Auth::guard('admin')->check()){
            //     if( Auth::guard('admin')->user()->role == 0 || Auth::guard('super_admin')->user()->role == 1){
                    return redirect()->route('dashboard');
                // }else{
                //     return redirect()->back()->with('warning','Login Fail');
                // }
             }else{
            // dd("hello");
            return redirect()->back()->with('warning','Login Fail');
        }

    }
    //if user emial and password is correct loginned

     //logout function
     public function logout()
     {
 
         if (isset(Auth::guard('admin')->user()->id)) {
            // return "dafda";
             Auth::guard('admin')->logout();
             return redirect()->route('backside.admin.login');
 
         }
         
     }
}
