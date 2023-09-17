<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class Register extends Controller
{
    //
    public function create(){
        return view('index');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name'=>'required|max:255|alpha',
            'phone'=>'required|min:11|numeric',
            'address'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        return ("Successfully Store");
    }

    public function anotherstore(RegisterRequest $request){
        return ("Successfully Store");
    }

    public function ajaxStore(Request $request){
        return $request->all();
    }
}
