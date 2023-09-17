<?php

namespace App\Http\Controllers\book;

use App\Models\book;
use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Exports\BookExport;
use Excel;


//to use db table;
use Illuminate\Support\Facades\DB;


class bookcontroller extends Controller
{

    /**
     *
     * To get book list by using eloquent relationship
     *
     */
     public function showBook(){
        $book=Book::find(1);
        dd($book->category->name);
     }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title="";
        if($request->searchTitle && $request->searchTitle!=""){
            $title=$request->searchTitle;
        }

        // if($request->title && $request->title!=""){
        //     $title=$request->title;
        // }
        // $check=false;
        // if($request->category_id && $request->category_id !=""){
        //     $check=true;
        // }

        //to select all record
        // $data = book::all(); //select all row from db
        // return view("book.index",compact("data"));

        // $data = Book::join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category_name')->orderby('books.title','asc')->get();
        $data = Book::join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category_name')
        ->where('books.title','LIKE','%'.$title.'%')

        // ->onWhere('categories.id','=',$request->category_id)

        // ->whereNull('books.create_at')
        // ->where('books.create_at','=',null)

        // ->whereNotnulll('books.created_at')
        // ->where('books.created_at','!=',null)


        // ->when($request->has('category_id'),function($query)use($request){
            // ->when($check,function($query)use($request){
            //     $query->where('categories.id','=',$request->category_id);
            // })


        ->when($request->category_id,function($query)use($request){
            $query->where('categories.id','=',$request->category_id);
        })
        // ->where('books.title','LIKE','%the last one%')
        // ->where('categories.id','=',1) (or) ->where('categories.id','<>',1)
        ->orderby('books.title','asc')
        ->paginate(20);
        $categories=Category::all();

        return view('book.index', compact('data','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showList(Request $request){
        $title="";
        if($request->searchTitle && $request->searchTitle!=""){
            $title=$request->searchTitle;
        }

        $check=false;
        if($request->category_id && $request->category_id !=""){
            $check=true;
        }

        $categories=Category::all();

        $data=DB::table('books')
             ->join('categories','categories.id','=','books.category_id')
             ->where('books.title','LIKE','%'.$title.'%')
             ->when($check,function($query)use($request){
                $query->where('categories_id','=',$request->category_id);
             })
             ->orderby('books.title','asc')
             ->select('books.*','categories.name as category_name')
             ->paginate(20);
             return view('book.index',compact('data','categories'));
            //  ->get();
        // dd($book);
    }

    /**
     * to get book list by using datatable
     *
     */
    public function showbookList(Request $request){
        if($request->ajax()){
            $data = Book::join('categories','categories.id','=','books.category_id')
            ->select('books.*','categories.name as category_name')
            ->get();

            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action',function($row){
                $btn= '<a href="">delete</a>';
                $btn .= '<a href="">edit</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('book.showlist');

    }

    /** */
    public function create()
    {
        $categories=Category::all();
        return view('book.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title'=>'required',
            'authorname'=>'required',
            'description'=>'required',
            'publisher'=>'required',
            'publishyear'=>'required',
            'qty'=>'required',
            'price'=>'required',
            'photo'=>'required'
        ]);

        $book=new Book();
        $book->category_id=$request->category_id;
        $book->title =$request->title;
        $book->authorname =$request->authorname;
        $book->description =$request->description;
        $book->publisher =$request->publisher;
        $book->publishyear =$request->publishyear;
        $book->qty =$request->qty;
        $book->price =$request->price;

        //to store image in folder
        $uniq=uniqid(); //unique key;
        // dd($request->photo->getSize()); //to get the file size of an image as byte
        // $filename=$request->photo->getClientOriginalextension();//to get extension of the image
        // $filename=$request->photo->getClientOriginalName(); //to get the original name

        if(isset($request->photo)){
            $filename = "$uniq.".$request->photo->getClientOriginalextension();
            $request->photo->move(public_path('image'),$filename);

        //to store image in database

        $book->photo = "upload/$filename";
        }
        $book->save();
        return redirect('bookprocess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        //
        $book=book::find($request->bookprocess);
        if(!isset($book)){
            $request->session()->flash('message','Does not exist');
            return redirect('bookprocess');
        }
        return view('book.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book=book::find($id);
        if(isset($book)){
            $book->title =$request->title;
            $book->authorname =$request->authorname;
            $book->description =$request->description;
            $book->publisher =$request->publisher;
            $book->publishyear =$request->publishyear;
            $book->qty =$request->qty;
            $book->price =$request->price;
            $book->save();

            $request->session()->flash('message','Successfully Updated');
        }
        else{
            $request->session()->flash('message','Does not exist');
        }
        return redirect('bookprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        $book=book::find($id);
        if(isset($book)){
            $book->delete();
            $request->session()->flash('message','Successfully Delete');
            $request->session()->flash('alert-class','alert-success');
        }
        else{
            $request->session()->flash('message',"Error Deleting with id $id");
            $request->session()->flash('alert-class','alert-danger');
        }
        return redirect('/bookprocess');//index method
    }

    public function search(){
        // return view('book.search');
    }

    //export excel
    public function export(){
        return Excel::download(new BookExport,date('m_d_Y').'.xlsx');
    }
}
