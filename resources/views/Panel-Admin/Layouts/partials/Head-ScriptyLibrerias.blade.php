
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FiberMovil">

    <link rel="stylesheet" href="{{asset('js/bootstrap/css/bootstrap.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/js/bootstrap.js')}}"></script>
    {{-- include summernote css/js --}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    {{--JS--}}
    <script src="{{asset('js/MAIN/fibermovil.js')}}"></script>

    {{-- Favicons --}}

    <link href="{{asset('images/favicon.png')}}" rel="icon">
    <link href="{{asset('images/apple-touch-icon.png')}}" rel="apple-touch-icon">
    {{--Issue Font--}}
    <link href="{{asset('css/isshue1.9.css')}}" rel="stylesheet" type="text/css">

    {{--external css--}}
    <link href="{{asset('js/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    {{-- Datepicker --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Custom styles for this template --}}

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <!-- uikit -->
    <link rel="stylesheet" href="{{asset('bower_components/uikit/css/uikit.almost-flat.min.css')}}" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{asset('assets/icons/flags/flags.min.css')}}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('cs/selectize.css')}}">
    <script src="{{mix('js/app.js')}}"></script>