@extends('layouts.samplelayout')

@section('content')
    @if (Session::has('message'))
        <div class="alert {{Session::get('alert-class')}} alert-dismissible fade show" role="alert">
            <span>{{Session::get('message')}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container p-5">
        <div class="row">
            <div class="col-3">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add new category</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created date</th>
                            <th>Update date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->created_at->toFormattedDateString()}}</td>
                                <td>{{$category->updated_at->toFormattedDateString()}}</td>
                                <td>
                                    <form action="{{url('categories',[$category->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                                <td>
                                    {{-- <a href="{{route('categories.edit',['categories'=>$category->id])}}" class="btn btn-primary">Edit</a> --}}
                                    <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
