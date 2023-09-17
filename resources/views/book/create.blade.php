@extends('layouts.samplelayout')
@section('content')
<div class="container mt-5 shadow-lg con-bg border-radius">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 p-5 form-bg border-left-radius">
            <form action="/bookprocess" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="" class="p-0 m-0">Category</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option selected>Select Category</option>
                            @foreach ($categories as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                      </select>
                    <span class="err_msg p-0">
                        @error('title')
                            {{$message="Please enter the book title"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Title</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    <span class="err_msg p-0">
                        @error('title')
                            {{$message="Please enter the book title"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Author Name</label>
                    <input type="text" class="form-control" name="authorname" value="{{old('authorname')}}">
                    <span class="err_msg p-0">
                        @error('authorname')
                            {{$message="Please enter the author name"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Description</label>
                    <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    <span class="err_msg p-0">
                        @error('description')
                            {{$message="Please enter the book's description"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Publisher</label>
                    <input type="text" class="form-control" name="publisher" value="{{old('publisher')}}">
                    <span class="err_msg p-0">
                        @error('publisher')
                            {{$message="Please enter the book's publisher"}}
                        @enderror
                    </span>
                </div>

                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Publish Year</label>
                    <input type="text" class="form-control" name="publishyear" value="<?php if(isset($publishyear)){echo $publishyear;}?>">
                    <span class="err_msg p-0">
                        @error('publishyear')
                        {{$message="Please enter the book's published year"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Quantity</label>
                    <input type="number" class="form-control" name="qty" value="<?php if(isset($qty)){echo $qty;}?>">
                    <span class="err_msg p-0">
                        @error('qty')
                        {{$message="Please enter the quantity of the book"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Price</label>
                    <input type="number" class="form-control" name="price" value="<?php if(isset($price)){echo $price;}?>">
                    <span class="err_msg p-0">
                        @error('price')
                        {{$message="Please enter the price of the book"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-3">
                    <label for="" class="p-0 m-0">Photo</label>
                    <input type="file" class="form-control" name="photo" value="" accept="image/*">
                    <span class="err_msg p-0">
                        @error('price')
                        {{$message="Please upload the image"}}
                        @enderror
                    </span>
                </div>
                <div class="row mt-5">
                    <button class="btn btn-primary" name="btnSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
