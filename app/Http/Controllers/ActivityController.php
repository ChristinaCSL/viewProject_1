<?php

namespace App\Http\Controllers;
use App\Models\activity;
use App\Models\comment;
use App\Models\gallery;




use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //

    public function index(){
        $activity = Activity::find(1);
        $comment = new Comment();
        $comment->comment_text = "this is so good";
        $activity->comments()->save($comment);
        dd('success');
    }
}
