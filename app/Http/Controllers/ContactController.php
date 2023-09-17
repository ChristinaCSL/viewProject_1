<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class ContactController extends Controller
{
    //
    public function showUser(){
        $user=User::find(1);
        dd($user->contacts->address);
     }
}
