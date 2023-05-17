<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminRegisterController extends Controller
{
    //
    public function show_list(){
        $admins = Admin::all();
        return view('admin.adminregister.list',compact('admins'));
    }

    public function create_admin_register(){
            return view('admin.adminregister.create');
    }
    public function edit_admin_register($id){
            $admins = Admin::findorfail($id);
            return view('admin.adminregister.edit',compact('admins'));
    }
}
