<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Add</title>

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    @extends("layouts/onlineshop_admin")

    @section("contentProductSection")
        <div class="row mainbody-show">
            <div class="col-lg-4">
                <img src="{{asset('')}}" alt="">
            </div>
            <div class="col-lg-8">

            </div>
        </div>
    @endsection

</body>
</html>
