<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('page-title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/fonts/flaticon/font/flaticon.css')}}">

    <link rel="icon" href="{{ URL::asset('frontend/img/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ URL::asset('customer/css/style.css')}}">

</head>
<body id="top">
<div class="page_loader"></div>

<div class="login-6">
    <div class="container-fluid">
        <div class="row">
            <div class="@yield('col_class') col-md-12 bg-img">
                <div class="info">
                    <div class="waviy">
                        <span style="--i:1">W</span>
                        <span style="--i:2">e</span>
                        <span style="--i:3">l</span>
                        <span style="--i:4">c</span>
                        <span style="--i:5">o</span>
                        <span style="--i:6">m</span>
                        <span style="--i:7">e</span>
                        <span class="color-yellow" style="--i:8">t</span>
                        <span class="color-yellow" style="--i:9">o</span>

                        <span style="--i:10">K</span>
                        <span style="--i:11">h</span>
                        <span style="--i:12">o</span>
                        <span style="--i:13">j</span> 
                        <span style="--i:14">S</span>
                        <span style="--i:15">a</span>
                        <span class="color-red-themd" style="--i:16">n</span>
                        <span class="color-red-themd" style="--i:17">s</span>
                        <span style="--i:16">a</span>
                        <span style="--i:17">r</span>
                    </div>

                </div>
                <div class="bg-photo">
                    <img src="{{ URL::asset('customer/img/restaurant.png')}}" alt="bg" class="img-fluid">
                </div>
            </div>
            <div class="@yield('colcreate_class') col-md-12 bg-color-6">
            @section('container')
            @show
        </div>
    </div>
</div>
@stack('after-scripts')
</body>


</html>
