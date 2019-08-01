<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog Project @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="{{ asset('blog_assets/img/favicon.png') }}" rel="stylesheet">
    <!-- STYLES -->
    @yield('css')
    <link href="{{ asset('blog_assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/slippry.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('blog_assets/css/style.css') }}" rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 80%;
        height: 350px;
        margin: auto;
    }
    </style>
</head>

<body>
    <!-- Header -->
    @include('blog.layouts.header')



    <!-- CONTENT -->
    @yield('content')

    <!--  Footer  -->  
    @include('blog.layouts.footer')   

    <!--  Script  -->   
    <script type="text/javascript" src="{{ asset('blog_assets/js/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('blog_assets/js/slippry.js') }}"></script>
    <script type="text/javascript" src="{{ asset('blog_assets/js/main.js') }}"></script>
    
    @yield('script')
</body>
</html>