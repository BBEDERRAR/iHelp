<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IHelp </title>
    <link href="{{asset('css/rotating-card.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/animate.css')}}" rel="stylesheet"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>


        body {
            font-family: 'Indie Flower', cursive;
        }
    </style>

    @yield('css')

</head>
<body>

@include('layouts.components.navbar')
<!--End Our NavBar-->
<section id="content">
    @yield('content')
</section>
<!--Start Our Footer-->
@include('layouts.components.footer')
<!--End Our Footer-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script>

</script>
@yield('js')
</body>
</html>