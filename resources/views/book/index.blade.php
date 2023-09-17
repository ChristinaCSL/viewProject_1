@extends('layouts.samplelayout')

@section('content')
    @if (Session::has('message'))
        <div class="alert {{Session::get('alert-class')}} alert-dismissble fade show" role="alert">
            <p>{{Session::get('message')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <a href="{{route('bookprocess.create')}}">Add new book</a>

    <div class="row">
        <div class="col-12 pt-5">
            <form action="{{route('bookprocess.index')}}" method="GET">
                <div class="row">
                    <div class="col-4">
                        <label for="">Search by Title</label>
                        <div>
                            <input type="text" name="searchTitle" class="form-control" value="{{Request::get('searchTitle')}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">Search by Category</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                          </select>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary mt-4" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Authorname</th>
                <th>Description</th>
                <th>Publisher</th>
                <th>Pubish Year</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Create date</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>100</td>
                <td>ABC</td>
                <td>Christina</td>
                <td>This is a philosophy book</td>
                <td>Me</td>
                <td>2023</td>
                <td>35</td>
                <td>100</td>
                <td>NULL</td>
                <td>Category</td>
                <td>
                    <form action="{{url('bookprocess',[100])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>

            @foreach ($data as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->authorname}}</td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->publishyear}}</td>
                    <td>{{$book->qty}}</td>
                    <td>{{$book->price}}</td>
                    {{-- <td>{{$book->created_at->toFormattedDateString()}}</td> --}}
                    <td>{{\Carbon\Carbon::parse($book->created_at)->isoFormat('MMM Do YYYY')}}</td>
                    <td>{{$book->category_name}}</td>
                    <td>
                        <form action="{{url('bookprocess',[$book->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    <td>
                        <a href="{{route('bookprocess.edit',['bookprocess'=>$book->id])}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
