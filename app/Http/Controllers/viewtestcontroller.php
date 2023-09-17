<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class viewtestcontroller extends Controller
{
    //
    function viewpage(){
        $data[0]=0;
        $randomValue=rand(1,20);
        for($i=0;$i<$randomValue;$i++){
            $data[$i]=$i;
        }
        $blank="";
        $testArray=array();

        $customer=array(array("name"=>"mgmg","address"=>"ygn"),array("name"=>"aung aung","address"=>"mdy"),array("name"=>"zaw zaw","address"=>"SG"));

        $c=new Customer();
        $c->name="Christina";
        $c->address="YGN";
        $c->email="christina@gmail.com";
        $c->password="123";
        $c->save();

        return view("staff.register",compact("data","randomValue","blank","testArray","customer"));


    }
}
