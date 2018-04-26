<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashboard/plugins/images/favicon.png')}}">
    <title>{{__('landing.title')}}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('dashboard/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}"
          rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('dashboard/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('dashboard/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @if(app()->getLocale()==='ar')
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
        <style>
            nav,body,label, h1, h2, h3, h4, h5, h6, p, tr, td, ul, li, i, span, option ,button{
                font-family: 'DroidArabicKufiRegular' ;
            }

            h1, h2, h3, h4, h5, h6,label,span,p,input,button{
                text-align: right ;
            }

            li {
                list-style: none;
            }
        </style>
    @endif
</head>
<body>
<!-- Preloader -->
{{--<div class="preloader">--}}
{{--<div class="cssload-speeding-wheel"></div>--}}
{{--</div>--}}


@yield('content')



<!-- jQuery -->
<script src="{{asset('dashboard/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('dashboard/bootstrap/dist/js/tether.min.js')}}"></script>
<script src="{{asset('dashboard/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!--slimscroll JavaScript -->
<script src="{{asset('dashboard/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('dashboard/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('dashboard/js/custom.min.js')}}"></script>
</body>
</html>

