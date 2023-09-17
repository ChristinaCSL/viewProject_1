<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    {{-- HEADER --}}
    {{-- for NAME & LOGO --}}
    <div class="container">
        <div class="row">
            <div class="col-12">Menu & Logo</div>
        </div>
    </div>


    {{-- MENU --}}
    {{-- FOR MENU LINKS --}}
    <div class="row">
        <div class="col-12">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Contact</a>
        </div>
    </div>

    {{-- CONTENT --}}

    <div class="container">
        <div class="row">
            <div class="col-4">
                Left side menu
                <ul>
                    <li>All</li>
                    <li>Men</li>
                    <li>Women</li>
                    <li>This is from parent master</li>
                    @show
                </ul>
            </div>
        </div>

        @yield("contentAdminSection")</div>
</body>

@yield("scripts")
</html>
