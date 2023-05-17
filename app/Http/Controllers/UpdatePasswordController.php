<?php
   
namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Shopowner;
  
class UpdatePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.adminregister.updatepassword');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        return dd($request);
        $request->validate([
            'new_password' => ['required' ,'unique:admins'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('dashboard');
    }
}