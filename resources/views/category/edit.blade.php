@extends('layouts.samplelayout')
@section('content')
<div class="container mt-5 shadow-lg con-bg border-radius">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 p-5 form-bg border-left-radius">
            <form action="{{url('categories',[$category->id])}}" method="POST">
                @method('PATCH') @csrf
                <div class="row">
                    <label for="" class="p-0 m-0">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$category->description}}">
                </div>
                <div class="row mt-5">
                    <button class="btn btn-primary" name="btnSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
