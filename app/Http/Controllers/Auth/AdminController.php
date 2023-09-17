<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    public function adminReg(){
        return view('admin.register');
    }

    public function regProcess(Request $request){
        $usertype="admin";
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype'=>$usertype,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/admin/dashboard');
    }
}
