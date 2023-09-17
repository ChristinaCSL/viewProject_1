@extends('layouts.samplelayout')
@section('content')
<div class="container mt-5 shadow-lg con-bg border-radius">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 p-5 form-bg border-left-radius">
            <form action="{{url('bookprocess',[$book->id])}}" method="POST">
                @method('PATCH') @csrf
                <div class="row">
                    <label for="" class="p-0 m-0">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$book->title}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Author Name</label>
                    <input type="text" class="form-control" name="authorname" value="{{$book->authorname}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$book->description}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Publisher</label>
                    <input type="text" class="form-control" name="publisher" value="{{$book->publisher}}">
                </div>

                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Publish Year</label>
                    <input type="text" class="form-control" name="publishyear" value="{{$book->publishyear}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Quantity</label>
                    <input type="number" class="form-control" name="qty" value="{{$book->qty}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$book->price}}">
                </div>
                <div class="row mt-5">
                    <button class="btn btn-primary" name="btnSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
