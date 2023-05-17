<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Admin;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserRegisterController extends Controller
{
    //
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:50', 'unique:admins', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create()
    {
        return view('auth.register');
    }

    protected function store(Request $request)
    {
        $valid=$this->validator($request->except('_token'));
        if( $valid->fails())
        {
            // return redirect()->back()->withErrors($valid)->withInput();
            // dd($valid->messages());
            return response()->json($valid->messages());
        }
        $data = $request->except("_token");
        \RegisterLog::RegisterLog($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
       
        Auth::guard('web')->logout();
        if(Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])) {

            if(Auth::guard('web')->check()){
               if( Auth::guard('web')->user()->role == 0 || Auth::guard('super_admin')->user()->role == 1){
                //    return redirect()->back()->with('success','Successfully register your account!');
                // dd(Auth::guard('web')->user()->id);
                Session::put('user_id',Auth::guard('web')->user()->id);
                logger("Register user id ".Auth::guard('web')->user()->id);

                return response()->json(['status' => 'success','user_id' => Auth::guard('web')->user()->id ]);
               }else{
                //    return redirect()->back()->with('message','Login Fail');
                return response()->json(['status' => 'fail']);
               }
            }
       }else{
           return redirect()->back()->with('message','Login Fail');
       }

    }

}
