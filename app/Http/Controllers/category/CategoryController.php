<?php

namespace App\Http\Controllers\category;

use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CategoryExport;
use Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data=category::all();
        // return view("category.index",compact("data"));
        $category=Category::find(1);
        // dd($category->books);
        foreach($category->books as $book){
            echo $book->title."<br>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category=new category();
        $category->name =$request->name;
        $category->description =$request->description;
        $category->save();
        if(isset($category)){
            $request->session()->flash('alert-class','alert-success');
            $request->session()->flash('message','Category is successfully added');
        }
        else{
            $request->session()->flash('alert-class','alert-danger');
            $request->session()->flash('message','Error adding the category');
        }
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        //
        $category=category::find($id);
        if(!isset($category)){
            $request->session()->flash('alert-class','alert-danger');
            $request->session()->flash('message','Does not exist');
            return redirect('categories');
        }
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category=category::find($id);
        if(isset($category)){
            $category->name =$request->name;
            $category->description =$request->description;
            $category->save();

            $request->session()->flash('message','Successfully Updated');
        }
        else{
            $request->session()->flash('message','Does not exist');
        }
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        $category=category::find($id);
        if(isset($category)){
            $category->delete();
            $request->session()->flash('message','Successfully Delete');
            $request->session()->flash('alert-class','alert-success');
        }
        else{
            $request->session()->flash('message',"Error Deleting with id $id");
            $request->session()->flash('alert-class','alert-danger');
        }
        return redirect('/categories');//index method
    }

    public function export(){
        return Excel::download(new CategoryExport(),'category'.date('m_d_Y').'.xlsx');
    }
}
