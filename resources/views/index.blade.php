<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap CSS  --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
    <form action="{{route('AnotherStore')}}" method="POST">
        @csrf
        <div class="container p-5">
            <div class="row">
                <div class="col-6">Name</div>
                <div class="col-6">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">Address</div>
                <div class="col-6">
                    <textarea name="address" id="" cols="30" rows="10" class="form-control">{{old('address')}}</textarea>
                    @error('address')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">Phone</div>
                <div class="col-6">
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    @error('phone')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">Email</div>
                <div class="col-6">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">Password</div>
                <div class="col-6">
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
    </form>

    {{-- BOOTSTRAP JS --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
