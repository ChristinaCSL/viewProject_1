<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container img-banner">
                <div class="admin-header">
                    <h1>ADMIN PANEL</h1>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 side-menu-cus">
                <a href="" class="side-menu-link"><div class="col-lg-12 mt-2 side-menu-button">Account Setting</div></a>
                <a href="" class="side-menu-link"><div class="col-lg-12 mt-2 side-menu-button">Add Products</div></a>
                <a href="" class="side-menu-link"><div class="col-lg-12 mt-2 side-menu-button">View Products</div></a>
                <a href="" class="side-menu-link"><div class="col-lg-12 mt-2 side-menu-button">Log out</div></a>
            </div>
            <div class="col-lg-8">
                <div class="col-lg-12 mainbody">
                    @yield("contentProductSection")

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container text-center cus-footer"><p>All rights reserved &copy; Christina , 2023</p></div>
        </div>
    </div>
</body>
</html>
