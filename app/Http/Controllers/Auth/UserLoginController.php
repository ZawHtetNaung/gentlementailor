<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\TemporaryCustomizeStep;
use App\TemporaryCustomizeStepData;

class UserLoginController extends Controller
{

     //show form
     public function loginform()
     {
         return view('auth.login');
     }
     // show form

      //if user email and password is correct loginned
    public function login(Request $request)
    {

        logger($request);
        // dd("hell");
        $data = $request->except('_token');
        // $validator= Validator::make($data, [
        //     'email' => ['required', 'string', 'email', 'max:50'],
        //     'password' => ['required', 'string', 'min:8'],
        // ]);
        // if($validator->fails()){
            // dd($validator->messages());
            // return redirect()->back()->withErrors($validator)->withInput();
        //     return response()->json($validator->messages());

        // }

        if(Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            Session::put('user_id',Auth::guard('web')->user()->id);

            $has_step = TemporaryCustomizeStep::where("user_id",Auth::guard('web')->user()->id)->first();
            if($has_step == null) {
              $has_step_id = null;
            } else{
              $has_step_id = $has_step->id;
            }
            if($has_step != null){
              $has_step_data = TemporaryCustomizeStepData::where('temporary_id',$has_step->id)->first();

            } else {
              $has_step_data = null;
            }
            // dd($has_step_data);
            return response()->json([
            'status' => 'success',
            'user_id' => Auth::guard('web')->user()->id,
            'has_step' => $has_step_id,
            'has_step_data' => $has_step_data
          ]);
        }else{
            // return redirect()->back()->with('warning','Sorry ! Something went wrong');
            return response()->json(['status' => 'fail']);
        }
        // dd(Auth::user());
    }
    //if user emial and password is correct loginned

     //logout function
     public function logout()
     {

         if (isset(Auth::guard('web')->user()->id)) {
            // return "dafda";
            Session::put('user_id',null);
             Auth::guard('web')->logout();
            //  return redirect()->back()->with('success','Successfully logged out!');
             return response()->json(['status' => 'success']);

         }

     }
}
